<?php

namespace App\Console\Commands;

use App\ProjectKnowledge;
use App\Societe;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ScanProject extends Command
{
    protected $signature = 'project:scan';
    protected $description = 'Scanner le projet et sauvegarder les informations';

    public function handle()
    {
        $this->info('🔍 Démarrage du scan...');

        // Vider la table
        ProjectKnowledge::truncate();
        $this->info('✓ Table vidée');

        // Scanner dans l'ordre
        $this->saveMainContext();
        $this->scanCategories();
        $this->scanLogiciels();
        $this->scanSocietes();

        $total = ProjectKnowledge::count();
        $this->info("✅ Scan terminé! Total: {$total} entrées");

        // Afficher les stats
        $this->showStats();
    }

    private function saveMainContext()
    {
        ProjectKnowledge::create([
            'type' => 'context',
            'name' => 'plateforme',
            'content' => 'PLATEFORME: GUIDE DES SOLUTIONS NUMÉRIQUES - Plateforme française de comparaison de solutions logicielles professionnelles'
        ]);
        $this->info('✓ Contexte sauvegardé');
    }

    private function scanCategories()
    {
        $this->info('📂 Scan des catégories...');

        $categories = DB::table('categories')
            ->leftJoin('category_translations as ct', function ($join) {
                $join->on('categories.id', '=', 'ct.category_id')
                    ->where('ct.locale', '=', 'fr');
            })
            ->where('categories.status', 1)
            ->whereNotNull('ct.name')
            ->select('categories.id', 'ct.name')
            ->get();

        foreach ($categories as $category) {
            // ✅ COMPTAGE TOTAL
            $totalCount = DB::table('product_categories as pc')
                ->join('products as p', 'pc.product_id', '=', 'p.id')
                ->join('product_flat as pf', function ($join) {
                    $join->on('p.id', '=', 'pf.product_id')
                        ->where('pf.locale', '=', 'fr');
                })
                ->join('categories as c', 'pc.category_id', '=', 'c.id')
                ->where('pc.category_id', $category->id)
                ->where('c.status', 1)
                ->where('pf.visible_individually', 1)
                ->where('pf.is_valid_by_admin', 1)
                ->distinct()
                ->count('p.id');

            // ✅ COMPTAGE PARTENAIRES - العمود في product_flat
            $partnersCount = DB::table('product_categories as pc')
                ->join('products as p', 'pc.product_id', '=', 'p.id')
                ->join('product_flat as pf', function ($join) {
                    $join->on('p.id', '=', 'pf.product_id')
                        ->where('pf.locale', '=', 'fr')
                        ->where('p.is_congrate_partner', '=', 1);  // ✅ في product_flat
                })
                ->join('categories as c', 'pc.category_id', '=', 'c.id')
                ->where('pc.category_id', $category->id)
                ->where('c.status', 1)
                ->where('pf.visible_individually', 1)
                ->where('pf.is_valid_by_admin', 1)
                ->distinct()
                ->count('p.id');

            $content = "Catégorie: {$category->name}\n";
            $content .= "Total: {$totalCount}\n";
            $content .= "Partenaires: {$partnersCount}\n";

            ProjectKnowledge::create([
                'type' => 'category',
                'name' => $category->name,
                'content' => $content,
                'metadata' => json_encode([
                    'id' => $category->id,
                    'total' => $totalCount,
                    'partners' => $partnersCount
                ])
            ]);

            $this->info("  ✓ {$category->name} ({$totalCount} logiciels, {$partnersCount} partenaires)");
        }
    }

    private function scanLogiciels()
    {
        $this->info('📦 Scan des logiciels...');

        $logiciels = DB::table('products as p')
            ->join('product_flat as pf', function ($join) {
                $join->on('p.id', '=', 'pf.product_id')
                    ->where('pf.locale', '=', 'fr');
            })
            ->join('product_categories as pc', 'p.id', '=', 'pc.product_id')
            ->join('categories as c', 'pc.category_id', '=', 'c.id')
            ->join('category_translations as ct', function ($join) {
                $join->on('c.id', '=', 'ct.category_id')
                    ->where('ct.locale', '=', 'fr');
            })
            ->where('c.status', 1)
            ->where('pf.visible_individually', 1)
            ->where('pf.is_valid_by_admin', 1)
            ->select(
                'p.id',
                'p.admin_id',
                'pf.name',
                'p.is_congrate_partner',
                'pf.description',
                'ct.name as category_name',
                'c.id as category_id'
            )
            ->distinct()
            ->get();

        $count = 0;
        $partnersCount = 0;

        foreach ($logiciels as $logiciel) {
            $societe = Societe::find($logiciel->admin_id);

            // Nettoyer la description
            $description = strip_tags($logiciel->description ?? '');
            $description = preg_replace('/\s+/', ' ', $description);
            $description = trim($description);

            // ✅ تأكد من القيمة الصحيحة
            $isPartner = ($logiciel->is_congrate_partner == 1 || $logiciel->is_congrate_partner === '1');

            if ($isPartner) {
                $partnersCount++;
            }

            $content = "Logiciel: {$logiciel->name}\n";
            $content .= "Catégorie: {$logiciel->category_name}\n";
            $content .= "Description: {$description}\n";
            $content .= "Partenaire: " . ($isPartner ? "Oui" : "Non") . "\n";

            if ($societe) {
                $content .= "Société: {$societe->nom}\n";
                if (!empty($societe->site_web) && $societe->site_web !== 'null') {
                    $content .= "Site: {$societe->site_web}\n";
                }
            }

            ProjectKnowledge::create([
                'type' => 'logiciel',
                'name' => $logiciel->name,
                'content' => $content,
                'metadata' => json_encode([
                    'id' => $logiciel->id,
                    'category_id' => $logiciel->category_id,
                    'category' => $logiciel->category_name,
                    'is_partner' => $isPartner,
                    'societe_id' => $logiciel->admin_id
                ])
            ]);

            $count++;
            if ($count % 10 == 0) {
                $this->info("  ✓ {$count} logiciels scannés... ({$partnersCount} partenaires)");
            }
        }

        $this->info("  ✓ Total: {$count} logiciels ({$partnersCount} partenaires)");
    }

    private function scanSocietes()
    {
        $this->info('🏢 Scan des sociétés...');

        $societes = DB::table('societes')->get();

        foreach ($societes as $societe) {
            $content = "Société: {$societe->nom}\n";
            $content .= "Adresse: {$societe->adresse}\n";

            if (!empty($societe->site_web) && $societe->site_web !== 'null') {
                $content .= "Site: {$societe->site_web}\n";
            }

            if (!empty($societe->contact_nom)) {
                $content .= "Contact: {$societe->contact_nom}\n";
            }

            if (!empty($societe->contact_email)) {
                $content .= "Email: {$societe->contact_email}\n";
            }

            if (!empty($societe->contact_telephone)) {
                $content .= "Tel: {$societe->contact_telephone}\n";
            }

            ProjectKnowledge::create([
                'type' => 'societe',
                'name' => $societe->nom,
                'content' => $content,
                'metadata' => json_encode([
                    'id' => $societe->id,
                    'website' => $societe->site_web
                ])
            ]);
        }

        $this->info("  ✓ {$societes->count()} sociétés");
    }

    private function showStats()
    {
        $this->info("\n📊 STATISTIQUES FINALES:");
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");

        $logiciels = DB::table('project_knowledge')->where('type', 'logiciel')->count();
        $categories = DB::table(table: 'project_knowledge')->where('type', 'category')->count();
        $societes = DB::table(table: 'project_knowledge')->where('type', 'societe')->count();

        // Comptage des partenaires depuis le content
        $partners = DB::table('project_knowledge')
            ->where('type', 'logiciel')
            ->where('content', 'LIKE', '%Partenaire: Oui%')
            ->count();

        $this->info("📦 Logiciels      : {$logiciels}");
        $this->info("✅ Partenaires    : {$partners}");
        $this->info("📂 Catégories     : {$categories}");
        $this->info("🏢 Sociétés       : {$societes}");
        $this->info("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n");

        // Stats par catégorie
        $this->info("📂 DÉTAIL PAR CATÉGORIE:");
        $cats = DB::table('project_knowledge')
            ->where('type', 'category')
            ->get();

        foreach ($cats as $cat) {
            $meta = json_decode($cat->metadata, true);
            $total = $meta['total'] ?? 0;
            $partners = $meta['partners'] ?? 0;

            $this->info(sprintf(
                "  • %-50s : %3d solutions (%d ✅)",
                $cat->name,
                $total,
                $partners
            ));
        }

        $this->info("\n✅ Données prêtes pour l'IA!");
    }
}