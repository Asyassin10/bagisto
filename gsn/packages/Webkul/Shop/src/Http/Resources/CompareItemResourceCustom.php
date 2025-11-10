<?php

namespace Webkul\Shop\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;

class CompareItemResourceCustom extends JsonResource
{
    /**
     * Contains comparable attributes.
     *
     * @var array
     */
    protected static $comparableAttributes = [];


    public static function collection($resource)
    {
        self::$comparableAttributes = app(AttributeFamilyRepository::class)->getComparableAttributesBelongsToFamilyWithCustomSelect();
        //self::$comparableAttributes = app(AttributeFamilyRepository::class)->getComparableAttributesBelongsToFamilyWithCustomSelect();
        //self::$comparableAttributes = app(AttributeFamilyRepository::class)->getComparableAttributesBelongsToFamily();

        return parent::collection($resource);
    }


    public function toArray($request)
    {
        $data = (new ProductResourceCustom($this->resource))
            ->toArray($this->resource);

        if ($this->resource->categories) {
            $data['categories'] = $this->resource->categories[0];
        }

        foreach (self::$comparableAttributes as $attribute) {
            /*   if (in_array($attribute->code, ['name', 'price'])) {
                continue;
            } */

            if (in_array($attribute->type, ['select', 'multiselect', 'checkbox'])) {
                $labels = [];

                $attributeOptions = $attribute->options->whereIn('id', explode(',', $this->{$attribute->code}));

                foreach ($attributeOptions as $attributeOption) {
                    if ($label = $attributeOption->label) {
                        $labels[] = strip_tags($label);
                    }
                }

                $data[$attribute->code] = implode(', ', $labels);
            }
            if ($attribute->type == "text") {
                $value = $this->{$attribute->code};

                if (!empty($value)) {
                    $data[$attribute->code] = strip_tags($value);
                } else {
                    $data[$attribute->code] = null; // or "" depending on your preference
                }
            }
        }

        return $data;
    }
}
