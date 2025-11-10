<?php

namespace Webkul\Shop\Http\Controllers\API;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Http\Resources\AttributeResource;
use Webkul\Shop\Http\Resources\CategoryResource;
use Webkul\Shop\Http\Resources\CategoryTreeResource;

class CategoryController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected AttributeRepository $attributeRepository, protected CategoryRepository $categoryRepository, protected ProductRepository $productRepository) {}

    /**
     * Get all categories.
     */
    public function index(): JsonResource
    {
        /**
         * These are the default parameters. By default, only the enabled category
         * will be shown in the current locale.
         */
        $defaultParams = [
            'status' => 1,
            'locale' => app()->getLocale(),
        ];

        $categories = $this->categoryRepository->getAll(array_merge($defaultParams, request()->all()));

        return CategoryResource::collection($categories);
    }

    /**
     * Get all categories in tree format.
     */
    public function tree(): JsonResource
    {
        $categories = $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);

        return CategoryTreeResource::collection($categories);
    }

    /**
     * Get filterable attributes for category.
     */

    public function getAttributes(): JsonResource
    {
        // Check if 'category_id' is not present in the request
        if (!request('category_id')) {
            // Fetch visible category tree based on the current channel's root category ID
            $categories = $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);

            // Transform categories into the desired structure for options
            $options = $categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            });

            return JsonResource::make([
                'data' => [
                    [
                        'id' => 2,
                        'code' => 'is_congrate_partner',
                        'type' => 'checkbox', 
                        'name' => 'Partenaire Congrès',
                        'options' => [
                            [
                                'id' => 1,
                                'name' => 'oui',
                            ],
                        ],
                    ],
                    [
                        'id' => 1,
                        'code' => 'category_id',
                        'type' => 'select',
                        'name' => 'Thématiques',
                        'options' => $options,
                    ],
                ],
            ]);
        }

        $category = $this->categoryRepository->findOrFail(request('category_id'));

        if (empty(($filterableAttributes = $category->filterableAttributes))) {
            $filterableAttributes = $this->attributeRepository->getFilterableAttributes();
        }

        $additionalCongreFilter = [
            'id' => 999,
            'code' => 'is_congrate_partner',
            'type' => 'checkbox',
            'name' => 'Partenaire congrès',
            'options' => [
                [
                    'id' => 1,
                    'name' => 'oui',
                ],
            ],
        ];

        return JsonResource::make([
            'data' => array_merge(AttributeResource::collection($filterableAttributes)->resolve(), [$additionalCongreFilter]),
        ]);
    }

    /**
     * Get product maximum price.
     */
    public function getProductMaxPrice($categoryId = null): JsonResource
    {
        $maxPrice = $this->productRepository->getMaxPrice(['category_id' => $categoryId]);

        return new JsonResource([
            'max_price' => core()->convertPrice($maxPrice),
        ]);
    }
}
