<?php

namespace App\Http\Controllers;

use App\Services\LogicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
 
class ChatbotController extends Controller
{
    public function chatbot (Request $request) {
        set_time_limit(100000);
         $question = $request->input('prompt');
    if (!$question) {
        return response()->json(['error' => 'Question requise'], 400);
    }
    // ============================================
    //  Caching
    // ============================================
    $cacheKey = 'ai_categories_data_v2';
    $categories = Cache::remember($cacheKey, 3600, function () {
        return DB::table('project_knowledge')
            ->where('type', operator: 'category')
            ->where('name', '!=', 'Racine')
            ->get()
            ->map(function ($cat) {
                $meta = json_decode($cat->metadata, true) ?? ['total' => 0, 'partners' => 0];

                $name = $cat->name;
                $normalized = preg_replace('/\s+/', ' ', trim(str_replace(
                    ['é', 'è', 'ê', 'à', 'ù', 'ô', 'î', 'ç', '-'],
                    ['e', 'e', 'e', 'a', 'u', 'o', 'i', 'c', ' '],
                    mb_strtolower($name, 'UTF-8')
                )));

                return [
                    'id' => $cat->id ?? 0,
                    'name' => $name,
                    'name_lower' => mb_strtolower($name, 'UTF-8'),
                    'name_normalized' => $normalized,
                    'total' => intval($meta['total'] ?? 0),
                    'partners' => intval($meta['partners'] ?? 0)
                ];
            });
    });

    // 📊 اOverall statistics
    $totalLogiciels = $categories->sum('total') ?: DB::table('project_knowledge')->where('type', 'logiciel')->count();
    $totalPartners = $categories->sum('partners') ?: DB::table('project_knowledge')->where('type', 'logiciel')->where('content', 'LIKE', '%Partenaire: Oui%')->count();
    $totalCategories = $categories->count();
    $totalSocietes = DB::table('project_knowledge')->where('type', 'societe')->count();

    // ============================================
    // 🧠Question analysis
    // ============================================
    $ai = new LogicService($question);
    $analysis = $ai->analyzeQuestion();


    $targetCategory = $ai->extractCategory($categories);
    $logicielNames = $ai->extractLogicielNames();

    // ============================================
    // 🎯 Improved and concise Prompt build
    // ============================================
    $prompt = "Tu es un assistant IA spécialisé dans notre plateforme de gestion des logiciels et solutions numériques.\n";
    $prompt .= "Tu ne dois répondre qu'aux questions concernant cette plateforme.\n";
    $prompt .= "Si tu as besoin de plus d'informations sur la plateforme pour répondre, indique-le clairement.\n";
    $prompt .= "Réponds uniquement en français.\n\n";
    $prompt .= "📊 STATS: {$totalLogiciels} solutions | {$totalPartners} partenaires | {$totalSocietes} éditeurs | {$totalCategories} catégories\n\n";

    // Add categories specifically 
    $prompt .= "📂 CATÉGORIES:\n";
    foreach ($categories as $cat) {
        $badge = $cat['partners'] > 0 ? " ({$cat['partners']} ✅)" : "";
        $prompt .= "• {$cat['name']}: {$cat['total']}{$badge}\n";
    }

    $prompt .= "\n🎯 TYPE: {$analysis['type']}\n";
    if ($targetCategory) {
        $prompt .= "📂 CATÉGORIE: {$targetCategory}\n";
    }

    // ============================================
    // 🎯 Strict and concise rules
    // ============================================
    $prompt .= "\n🎯 RÈGLES:\n";
    $prompt .= "1. Réponds COURT et PRÉCIS (max 5-10 lignes)\n";
    $prompt .= "2. Utilise les emojis: 📦 logiciels | ✅ partenaires | 🏢 éditeurs\n";
    $prompt .= "3. Format simple:\n";

    switch ($analysis['type']) {
        case 'count_total':
        case 'count_partners':
        case 'count_editors':
        case 'count_in_category':
        case 'count_partners_in_category':
            $prompt .= "   Format: '✅ [NOMBRE] [type] [contexte si nécessaire]'\n";
            break;

        case 'list_all_partners':
        case 'list_partners_in_category':
        case 'list_by_category':
        case 'list_all_logiciels':
            $prompt .= "   Format liste:\n   • Nom 1 ✅ (si partenaire)\n   • Nom 2\n   ...\n";
            break;

        case 'logiciel_details':
            $prompt .= "   Format:\n   📦 Nom\n   📂 Catégorie\n   🏢 Éditeur\n   📝 Description courte\n";
            break;
    }

    $prompt .= "4. Si TROUVÉ → réponds direct | Si PAS TROUVÉ → 'Information non disponible'\n";
    $prompt .= "5. JAMAIS de phrases inutiles, JAMAIS de salutations longues\n\n";

    // ============================================
    // 📦  Chunks
    // ============================================
    if ($analysis['needs_data']) {
        $query = DB::table('project_knowledge')->where('type', 'logiciel');

        // filtering based on analysis type
        if (in_array($analysis['type'], ['list_all_partners', 'count_partners', 'list_partners_in_category', 'count_partners_in_category'])) {
            $query->where('content', 'LIKE', '%Partenaire: Oui%');
        }

        if ($targetCategory) {
            $query->where('content', 'LIKE', '%Catégorie: ' . $targetCategory . '%');
        }

        if (!empty($logicielNames) && in_array($analysis['type'], ['editor_of_logiciel', 'logiciel_details', 'compare_logiciels'])) {
            $query->where(function ($q) use ($logicielNames) {
                foreach ($logicielNames as $name) {
                    $q->orWhere('name', 'LIKE', "%{$name}%")
                        ->orWhere('content', 'LIKE', "%{$name}%");
                }
            });
        }

        // Chunk 
        $limit = in_array($analysis['type'], ['list_all_logiciels', 'list_by_category']) ? 50 : 30;
        $logiciels = $query->limit($limit)->get();

        if ($logiciels->count() > 0) {
            $prompt .= "\n📦 DONNÉES ({$logiciels->count()}):\n";

            foreach ($logiciels as $log) {
                // Extract information in a simplified way
                preg_match('/Logiciel: (.+)/m', $log->content, $name);
                preg_match('/Catégorie: (.+)/m', $log->content, $cat);
                preg_match('/Partenaire: (.+)/m', $log->content, $partner);
                preg_match('/Société: (.+)/m', $log->content, $societe);

                if (isset($name[1])) {
                    $isPartner = isset($partner[1]) && trim($partner[1]) === 'Oui' ? ' ✅' : '';
                    $prompt .= "• " . trim($name[1]) . $isPartner;

                    if (isset($cat[1])) {
                        $prompt .= " | " . trim($cat[1]);
                    }
                    if (isset($societe[1])) {
                        $prompt .= " | " . trim($societe[1]);
                    }
                    $prompt .= "\n";
                }
            }
        } else {
            $prompt .= "\n⚠️ Aucune donnée trouvée\n";
        }

        // Upload companies if necessary
        if (in_array($analysis['type'], ['editor_details', 'list_all_editors', 'editor_of_logiciel'])) {
            $societesQuery = DB::table('project_knowledge')->where('type', 'societe');

            if (!empty($logicielNames)) {
                $societesQuery->where(function ($q) use ($logicielNames) {
                    foreach ($logicielNames as $name) {
                        $q->orWhere('name', 'LIKE', "%{$name}%");
                    }
                });
            }

            $societes = $societesQuery->limit(10)->get();

            if ($societes->count() > 0) {
                $prompt .= "\n🏢 ÉDITEURS:\n";
                foreach ($societes as $soc) {
                    preg_match('/Société: (.+)/m', $soc->content, $socName);
                    preg_match('/Site web: (.+)/m', $soc->content, $site);

                    if (isset($socName[1])) {
                        $prompt .= "• " . trim($socName[1]);
                        if (isset($site[1]) && trim($site[1]) && trim($site[1]) !== 'null') {
                            $prompt .= " - " . trim($site[1]);
                        }
                        $prompt .= "\n";
                    }
                }
            }
        }
    }

    $prompt .= "\n❓ QUESTION: \"{$question}\"\n\n";
    $prompt .= "RÉPONDS maintenant (COURT ET PRÉCIS):\n";

    // ============================================
    // 🚀 Streaming  
    // ============================================
    return response()->stream(function () use ($prompt) {
        $ch = curl_init('http://localhost:11434/api/generate');

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_POSTFIELDS => json_encode([
                'model' => 'qwen2.5:7b',
                'prompt' => $prompt,
                'stream' => true,
                'options' => [
                    'temperature' => 0.2,
                    'top_p' => 0.85,
                    'top_k' => 30,
                    'num_predict' => 500, // أقصر للردود السريعة
                    'repeat_penalty' => 1.2,
                    'stop' => ["QUESTION:", "Q:", "\n\n\n", "╔", "RÈGLES:"]
                ]
            ]),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_WRITEFUNCTION => function ($curl, $data) {
                $lines = explode("\n", trim($data));
                foreach ($lines as $line) {
                    if (empty($line)) continue;

                    $json = @json_decode($line, true);
                    if ($json && isset($json['response'])) {
                        echo "data: " . json_encode([
                            'text' => $json['response'],
                            'done' => $json['done'] ?? false
                        ]) . "\n\n";

                        @ob_flush();
                        @flush();
                    }
                }
                return strlen($data);
            },
        ]);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "data: " . json_encode([
                'text' => "❌ Erreur: " . curl_error($ch),
                'done' => true
            ]) . "\n\n";
        }

        curl_close($ch);
    }, 200, [
        'Content-Type' => 'text/event-stream',
        'Cache-Control' => 'no-cache',
        'X-Accel-Buffering' => 'no',
        'Connection' => 'keep-alive',
        'Access-Control-Allow-Origin' => '*',
    ]);
    }
}
