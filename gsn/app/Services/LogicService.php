<?php
namespace App\Services;

class LogicService
{
    private $question;
    private $questionLower;
    private $questionNormalized;
    private $keywords;
    private $semanticKeywords;

    public function __construct($question)
    {
        $this->question = $question;
        $this->questionLower = mb_strtolower(trim($question), 'UTF-8');
        $this->questionNormalized = $this->normalize($this->questionLower);
        $this->keywords = $this->extractKeywords();
        $this->semanticKeywords = $this->extractSemanticKeywords();
    }

    // ✨ Advanced normalization with typo handling
    private function normalize($text)
    {
        $replacements = [
            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'à' => 'a',
            'â' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'ù' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ô' => 'o',
            'ö' => 'o',
            'ò' => 'o',
            'î' => 'i',
            'ï' => 'i',
            'ì' => 'i',
            'ç' => 'c',
            'ñ' => 'n',
            '-' => ' ',
            '/' => ' ',
            '&' => ' and ',
            '?' => '',
            '!' => '',
            ',' => '',
            '.' => '',
            ':' => '',
            ';' => ''
        ];

        $text = str_replace(array_keys($replacements), array_values($replacements), $text);
        return preg_replace('/\s+/', ' ', trim($text));
    }

    // 🎯 Extract semantic keywords based on synonyms
    private function extractSemanticKeywords()
    {
        $synonyms = [
            'combien' => ['nombre', 'total', 'quantite', 'count'],
            'liste' => ['affiche', 'montre', 'donne', 'enumere', 'quels', 'quelles'],
            'partenaire' => ['partenaires', 'congres', 'partner'],
            'logiciel' => ['logiciels', 'solution', 'solutions', 'application', 'applications', 'outil', 'outils', 'produit', 'produits'],
            'societe' => ['societes', 'editeur', 'editeurs', 'entreprise', 'entreprises', 'compagnie'],
            'categorie' => ['categories', 'domaine', 'domaines', 'type', 'types'],
            'dans' => ['de', 'en', 'pour', 'sur'],
            'detail' => ['details', 'info', 'information', 'informations', 'description'],
            'compare' => ['comparaison', 'difference', 'differences', 'entre', 'vs', 'versus'],
        ];

        $semantic = [];
        foreach ($synonyms as $base => $syns) {
            foreach ($syns as $syn) {
                if (str_contains($this->questionNormalized, $syn)) {
                    $semantic[] = $base;
                    break;
                }
            }
        }

        return array_unique($semantic);
    }

    // 🔍 Extract keywords intelligently
    private function extractKeywords()
    {
        $stopWords = [
            'le','la','les','un','une','des','de','du','et','ou','est','sont','dans','sur','pour','avec','par',
            'qui','que','quoi','quel','quelle','me','te','se','nous','vous','il','elle','on','ils','elles',
            'ce','cette','ces','mon','ton','son','ma','ta','sa','mes','tes','ses','moi','toi','lui','eux','y','en',
            'a','as','ai','au','aux'
        ];

        $words = explode(' ', $this->questionNormalized);
        return array_values(array_filter($words, function ($word) use ($stopWords) {
            return strlen($word) > 2 && !in_array($word, $stopWords) && !is_numeric($word);
        }));
    }

    // 🎯 Analyze the question type precisely
    public function analyzeQuestion()
    {
        $q = $this->questionNormalized;
        $sem = $this->semanticKeywords;

        // 🔢 Counting questions
        if (in_array('combien', $sem) || in_array('nombre', $sem)) {
            if (in_array('partenaire', $sem)) {
                if (in_array('dans', $sem) || in_array('categorie', $sem)) {
                    return ['type' => 'count_partners_in_category', 'priority' => 12, 'needs_data' => true];
                }
                return ['type' => 'count_partners', 'priority' => 11, 'needs_data' => false];
            }
            if (in_array('categorie', $sem) || in_array('dans', $sem)) {
                return ['type' => 'count_in_category', 'priority' => 10, 'needs_data' => true];
            }
            if (in_array('societe', $sem)) {
                return ['type' => 'count_editors', 'priority' => 10, 'needs_data' => false];
            }
            return ['type' => 'count_total', 'priority' => 10, 'needs_data' => false];
        }

        // 📋 List questions
        if (in_array('liste', $sem) || preg_match('/quels?|quelles?|donne|montre|affiche/i', $q)) {
            if (in_array('partenaire', $sem)) {
                if (in_array('dans', $sem) || in_array('categorie', $sem)) {
                    return ['type' => 'list_partners_in_category', 'priority' => 12, 'needs_data' => true];
                }
                return ['type' => 'list_all_partners', 'priority' => 11, 'needs_data' => true];
            }
            if (in_array('societe', $sem)) {
                return ['type' => 'list_all_editors', 'priority' => 10, 'needs_data' => true];
            }
            if (in_array('categorie', $sem)) {
                return ['type' => 'list_categories', 'priority' => 9, 'needs_data' => false];
            }
            if (in_array('dans', $sem)) {
                return ['type' => 'list_by_category', 'priority' => 10, 'needs_data' => true];
            }
            return ['type' => 'list_all_logiciels', 'priority' => 9, 'needs_data' => true];
        }

        // 🏢 Company-related questions
        if (preg_match('/societe (de|du)|editeur (de|du)|qui edite|quelle societe|quel editeur/i', $q)) {
            return ['type' => 'editor_of_logiciel', 'priority' => 11, 'needs_data' => true];
        }

        if (preg_match('/logiciel.*(societe|editeur)|produit.*(societe|editeur)/i', $q)) {
            return ['type' => 'logiciels_by_editor', 'priority' => 10, 'needs_data' => true];
        }

        // 🔍 Details questions
        if (in_array('detail', $sem) || preg_match('/cest quoi|quest ce que|parle moi|info|description/i', $q)) {
            return ['type' => 'logiciel_details', 'priority' => 11, 'needs_data' => true];
        }

        // ⚖️ Comparison questions
        if (in_array('compare', $sem) || preg_match('/entre .* et|vs|versus|plutot/i', $q)) {
            return ['type' => 'compare_logiciels', 'priority' => 11, 'needs_data' => true];
        }

        // 💡 Recommendation questions
        if (preg_match('/recommand|conseil|meilleur|choisir|suggere/i', $q)) {
            return ['type' => 'recommend_by_need', 'priority' => 10, 'needs_data' => true];
        }

        // ❓ Help questions
        if (preg_match('/aide|help|comment/i', $q)) {
            return ['type' => 'help', 'priority' => 8, 'needs_data' => false];
        }

        // 🔍 General search
        return ['type' => 'search_general', 'priority' => 7, 'needs_data' => true];
    }

    // 🎯 Extract the best category intelligently
    public function extractCategory($categories)
    {
        $bestMatch = null;
        $highestScore = 0;

        foreach ($categories as $cat) {
            $score = $this->calculateCategorySimilarity($cat);

            if ($score > $highestScore && $score > 0.25) {
                $highestScore = $score;
                $bestMatch = $cat['name'];
            }
        }

        return $bestMatch;
    }

    // 📊 Calculate similarity with category
    private function calculateCategorySimilarity($category)
    {
        $catWords = explode(' ', $category['name_normalized']);
        $questionWords = array_merge($this->keywords, $this->semanticKeywords);

        // Score 1: Common words ratio
        $commonWords = array_intersect($catWords, $questionWords);
        $wordScore = empty($catWords) ? 0 : count($commonWords) / count($catWords);

        // Score 2: Partial matching and typo handling
        $partialScore = 0;
        foreach ($catWords as $catWord) {
            foreach ($questionWords as $qWord) {
                if (strlen($catWord) > 3 && strlen($qWord) > 3) {
                    if (str_contains($qWord, $catWord) || str_contains($catWord, $qWord)) {
                        $partialScore += 0.7;
                    }
                    $lev = levenshtein($catWord, $qWord);
                    $maxLen = max(strlen($catWord), strlen($qWord));
                    if ($maxLen > 0 && $lev <= 2) {
                        $partialScore += (1 - $lev / $maxLen) * 0.5;
                    }
                }
            }
        }
        $partialScore = min($partialScore / max(count($catWords), 1), 1.0);

        // Score 3: Position bonus (words earlier in question = higher score)
        $positionBonus = 0;
        foreach ($catWords as $catWord) {
            $pos = mb_strpos($this->questionNormalized, $catWord);
            if ($pos !== false) {
                $positionBonus += (1 - $pos / max(mb_strlen($this->questionNormalized), 1)) * 0.2;
            }
        }

        return ($wordScore * 0.4) + ($partialScore * 0.4) + ($positionBonus * 0.2);
    }

    // 🔍 Extract software names from the question
    public function extractLogicielNames()
    {
        $words = explode(' ', $this->questionNormalized);
        $potentialNames = [];

        for ($i = 0; $i < count($words); $i++) {
            $word = $words[$i];

            // Skip common words
            if (strlen($word) <= 2 || in_array($word, ['logiciel', 'solution', 'dans', 'pour'])) {
                continue;
            }

            // Single-word names
            if (strlen($word) >= 3) {
                $potentialNames[] = $word;
            }

            // Two-word combinations
            if (isset($words[$i + 1]) && strlen($words[$i + 1]) >= 3) {
                $potentialNames[] = $word . ' ' . $words[$i + 1];
            }

            // Three-word combinations for complex names
            if (isset($words[$i + 1], $words[$i + 2])) {
                $potentialNames[] = $word . ' ' . $words[$i + 1] . ' ' . $words[$i + 2];
            }
        }

        return array_unique($potentialNames);
    }
}
