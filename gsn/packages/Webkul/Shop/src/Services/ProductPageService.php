<?php

namespace Webkul\Shop\Services;

use ErrorException;
use Illuminate\Support\Collection;

class ProductPageService
{
    public function CheckIfProductHasThisAttributeAndTypeIsNotText($attribute, $product)
    {


        if ($attribute->type == 'text') {
            if (stripos(haystack: $attribute->admin_name, needle: 'si non') !== false || stripos(haystack: $attribute->admin_name, needle: 'si oui') !== false || $attribute->code == "nQySJMv5RGvyAGed") {
                return false;
            }
            return true;
        }
        return true;
    }

    public function fetchNextValue(Collection $customAttributes, int $index): bool
    {
        if (!isset($customAttributes[$index + 1])) {
            throw new ErrorException("Next attribute does not exist"); // ✅ Best practice
        }
        $nextAttribute = $customAttributes[$index + 1];

        /*  if (
             $nextAttribute->type === 'text' && (stripos(haystack: $nextAttribute->admin_name, needle: 'si oui') !== false ||
                 stripos(haystack: $nextAttribute->admin_name, needle: 'si non') !== false || stripos(haystack: $nextAttribute->admin_name, needle: 'si gratuit') !== false || $nextAttribute->code == "nQySJMv5RGvyAGed")
         ) {
             return true;
         }
         return false; */
        return $nextAttribute->type === 'text' &&
            (stripos($nextAttribute->admin_name, 'si oui') !== false ||
                stripos($nextAttribute->admin_name, 'si non') !== false ||
                stripos($nextAttribute->admin_name, 'si gratuit') !== false ||
                ($nextAttribute->code ?? null) == "nQySJMv5RGvyAGed" ||
                ($nextAttribute->code ?? null) == "QzLtH7rwnv80zArd");
    }
    public function classifyString(string $input): bool
    {
        // Trim the input to remove extra spaces
        $trimmed = trim($input);

        // Check if the string contains spaces or if it's not excessively long
        if (strpos($trimmed, ' ') !== false) {
            return true;
        }

        // If the string is long and does not contain spaces, classify as a long unbroken string
        return false;
    }
}
