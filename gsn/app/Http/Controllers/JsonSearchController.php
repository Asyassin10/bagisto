<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonSearchController extends Controller
{
    protected $jsonPath;
        protected $index = [];


    public function __construct()
    {
        // ضع هنا مسار ملف JSON الكامل
        $this->jsonPath = storage_path('data.json');
         $this->buildIndex();
    }

    // دالة البحث العامة
public function search(Request $request)
{
    $data = json_decode(file_get_contents($this->jsonPath), true);
    $query = $request->query('q'); // المستخدم يرسل query فقط

    $results = $this->highLevelSearchAdvanced($data, $query); // تصحيح هنا
    return response()->json($results);
}

    // تفاصيل الفئة
    protected function getCategoryDetails($data, $categoryName)
    {
        foreach ($data['categories'] as $category) {
            if ($category['name'] === $categoryName) {
                return $category;
            }
        }
        return null;
    }

    // تفاصيل البرنامج
    protected function getLogicielDetails($data, $logicielName)
    {
        foreach ($data['categories'] as $category) {
            foreach ($category['logiciels'] as $logiciel) {
                if ($logiciel['name'] === $logicielName) {
                    return $logiciel;
                }
            }
        }
        return null;
    }

    // البحث عن البرامج حسب خاصية معينة
    protected function getLogicielsByAttribute($data, $attributeName, $attributeValue)
    {
        $result = [];
        foreach ($data['categories'] as $category) {
            foreach ($category['logiciels'] as $logiciel) {
                foreach ($logiciel['attribute_groups'] as $group) {
                    foreach ($group['attributes'] as $attr) {
                        if ($attr['name'] === $attributeName && $attr['value'] === $attributeValue) {
                            $result[] = $logiciel;
                            break 3; // الخروج بعد العثور على البرنامج
                        }
                    }
                }
            }
        }
        return $result;
    }
public function highLevelSearchAdvanced($data, $query)
{
    $query = strtolower($this->removeAccents($query));
    $tokens = explode(' ', $query);
    $results = [];

    foreach ($data['categories'] as $category) {
        $catName = strtolower($this->removeAccents($category['name']));
        $catScore = 0;

        // تحقق من الفئة
        foreach ($tokens as $token) {
            if (strpos($catName, $token) !== false || levenshtein($catName, $token) <= 2) {
                $catScore++;
            }
        }

        // تحقق من البرامج
        foreach ($category['logiciels'] as $logiciel) {
            $logicielName = strtolower($this->removeAccents($logiciel['name']));
            $logicielScore = 0;

            foreach ($tokens as $token) {
                if (strpos($logicielName, $token) !== false || levenshtein($logicielName, $token) <= 2) {
                    $logicielScore++;
                }
                // تحقق داخل الخصائص
                foreach ($logiciel['attribute_groups'] as $group) {
                    foreach ($group['attributes'] as $attr) {
                        $attrName = strtolower($this->removeAccents($attr['name']));
                        $attrValue = strtolower($this->removeAccents($attr['value'] ?? ''));
                        if (strpos($attrName, $token) !== false || strpos($attrValue, $token) !== false) {
                            $logicielScore++;
                        }
                    }
                }
            }

            if ($logicielScore > 0) {
                $results[] = [
                    'type' => 'logiciel',
                    'score' => $logicielScore,
                    'data' => $logiciel
                ];
            }
        }

        if ($catScore > 0) {
            $results[] = [
                'type' => 'category',
                'score' => $catScore,
                'data' => $category
            ];
        }
    }

    // ترتيب حسب أعلى score
    usort($results, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    return $results;
}

protected function removeAccents($str)
{
    return iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
}

protected function buildIndex()
    {
        if (!file_exists($this->jsonPath)) return;

        $data = json_decode(file_get_contents($this->jsonPath), true);

        foreach ($data['categories'] as $category) {
            $catKey = $this->normalizeText($category['name']);
            $this->index[$catKey] = [
                'type' => 'category',
                'ref' => $category
            ];

            foreach ($category['logiciels'] as $logiciel) {
                $logicielKey = $this->normalizeText($logiciel['name']);
                $this->index[$logicielKey] = [
                    'type' => 'logiciel',
                    'category' => $category['name'],
                    'ref' => $logiciel
                ];

                // إضافة كلمات من attributes
                foreach ($logiciel['attribute_groups'] as $group) {
                    foreach ($group['attributes'] as $attr) {
                        $text = $this->normalizeText($attr['name'] . ' ' . ($attr['value'] ?? ''));
                        $words = explode(' ', $text);
                        foreach ($words as $word) {
                            if (strlen($word) > 2) { // تجاهل كلمات قصيرة جداً
                                $this->index[$word][] = $logiciel;
                            }
                        }
                    }
                }
            }
        }
    }

    // Normalize text: lowercase + remove accents
    protected function normalizeText($text)
    {
        $text = strtolower($text);
        return iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
    }

    // دالة اختبار البحث عبر الـ index
    public function testSearch(Request $request)
    {
        $query = $request->query('q', '');
        $tokens = explode(' ', $this->normalizeText($query));
        $results = [];

        foreach ($tokens as $token) {
            if (isset($this->index[$token])) {
                foreach ((array)$this->index[$token] as $item) {
                    $results[] = $item;
                }
            }
        }

        // إزالة النتائج المكررة
        $results = array_unique($results, SORT_REGULAR);

        return response()->json($results);
    }

}
