<?php

namespace Webkul\GSN\Http\Controllers\Shop\API;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Customer\Repositories\CompareItemRepository;
use Webkul\Product\Models\ProductFlat;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Http\Controllers\API\APIController;
use Webkul\Shop\Http\Resources\AttributeResource;
use Webkul\Shop\Http\Resources\CompareItemResource;
use Webkul\Shop\Http\Resources\CompareItemResourceCustom;
use Webkul\Shop\Http\Resources\ProductResource;

class CompareController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected AttributeRepository $attributeRepository, protected CategoryRepository $categoryRepository, protected CompareItemRepository $compareItemRepository, protected ProductRepository $productRepository, protected AttributeFamilyRepository $attributeFamilyRepository) {}
    public function index()
    {
        // Start total execution time

        $productIds = request()->input('product_ids') ?? [];
        //   $this->logExecutionTime('Input retrieval', $startTime);

        /**
         * This will handle for customers.
         */
        if ($customer = auth()->guard('customer')->user()) {
            $productIds = $this->compareItemRepository
                ->findByField('customer_id', $customer->id)
                // ->pluck('product_id')
                ->toArray();
        }

        $products = $this->productRepository
            ->whereIn('id', $productIds)
            //->with('societe', "images")
            ->get();

        $response = CompareItemResourceCustom::collection(resource: $products);

        /// $this->logExecutionTime('Response creation', $responseStartTime);

        return $response;
        // return response()->json(["data" => $products]);
    }

public function getnoncompareyet()
{
    $productId = request()->input('product_id') ?? [];
    $categories = $this->productRepository->getCategoriesByProductId($productId);

    $catId = (int) $categories[0];

    // Initialize query builder
    $query = $this->productRepository
        ->whereHas('product_flats', function ($query) {
            $query->where('is_valid_by_admin', true);
        });

    // Add filter for congrate partner - explicitly specify products table
    if (request()->has('is_congrate_partner') && request()->boolean('is_congrate_partner')) {
        $query->where('products.is_congrate_partner', true); // Explicit table reference
    }

    // Prepare base parameters
    $requestParams = array_merge(request()->query(), [
        'status' => 1,
        'visible_individually' => 1,
        'category_id' => $catId,
    ]);

    // Map name parameter to query if present
    if (request()->has('name')) {
        $requestParams['query'] = request()->input('name');
        unset($requestParams['name']);
    }

    // Execute query
    $products = $query
        ->orderBy('products.is_congrate_partner', 'desc') // Explicit table reference
        ->setSearchEngine('database')
        ->getAll($requestParams);

    // Get filterable attributes
    $category = $this->categoryRepository->findOrFail($catId);
    $filterableAttributes = $category->filterableAttributes ?? $this->attributeRepository->getFilterableAttributes();

    // Add custom filter for congrate partner
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

    return [
        'products' => ProductResource::collection($products),
        'filters' => array_merge(AttributeResource::collection($filterableAttributes)->resolve(), [$additionalCongreFilter])
    ];
}
    /**
     * Address route index page.
     */
    /*    public function index(): JsonResource
    {
        Log::channel('fallback')->info("----------------");
        $executionTimes = [];


        // Start total execution time
        $startTime = microtime(true);

        $productIds = request()->input('product_ids') ?? [];
        //   $this->logExecutionTime('Input retrieval', $startTime);


        if ($customer = auth()->guard('customer')->user()) {
            $customerStartTime = microtime(true);

            $productIds = $this->compareItemRepository
                ->findByField('customer_id', $customer->id)
                ->pluck('product_id')
                ->toArray();

            $customerStartTimeExutionEnd = microtime(true) - $customerStartTime;

            Log::channel('fallback')->info("Customer product IDs retrieval: " . $customerStartTimeExutionEnd . ' seconds');

            $executionTimes["customer"] = $customerStartTimeExutionEnd;
        }

        $productsStartTime = microtime(true);

        $products = $this->productRepository
            ->whereIn('id', $productIds)
            ->get();

        //   $this->logExecutionTime('Product retrieval', $productsStartTime);

        $productsStartTimeExecutionEnd = microtime(true) - $productsStartTime;

        Log::channel('fallback')->info("Product retrieval: " . $productsStartTimeExecutionEnd . ' seconds');

        $executionTimes["Product"] = $productsStartTimeExecutionEnd;











        $responseStartTime = microtime(true);

        $response = CompareItemResource::collection($products);

        /// $this->logExecutionTime('Response creation', $responseStartTime);



        $responseStartTimeExecutionEnd = microtime(true) - $responseStartTime;

        Log::channel('fallback')->info("CompareItemResource retrieval: " . $responseStartTimeExecutionEnd . ' seconds');

        $executionTimes["CompareItemResource"] = $responseStartTimeExecutionEnd;

        // Log total execution time
        $totalExecutionTime = microtime(true) - $startTime;
        Log::channel('fallback')->info('Total execution time: ' . $totalExecutionTime . ' seconds');

        return
            $response->additional(["times" => $executionTimes]);
    } */

    public function getComparableAttributes()
    {
        $productIds = request()->input('product_ids') ?? [];

        // Check if productIds exist and are not empty
        if (empty($productIds)) {
            return response()->json(
                [
                    'data' => [],
                    'message' => 'No product IDs provided.',
                ],
                200,
            );
        }

        /**
         * This will handle for customers.
         */
        if ($customer = auth()->guard('customer')->user()) {
            $productIds = $this->compareItemRepository->findByField('customer_id', $customer->id)->pluck('product_id')->toArray();
        }

        $first_product_id = $productIds[0];
        $product = $this->productRepository->find($first_product_id);
        $attribute_familly_groups = $product->attribute_family->attribute_groups;
        $comparableAttributesApp = $this->attributeFamilyRepository->getComparableAttributesBelongsToSpeceficFamily($attribute_familly_groups->pluck('id'));
        foreach ($comparableAttributesApp as $comparableAttribute) {
            $comparableAttribute['group_app'] = $comparableAttribute->group[0]; //  $this->attributeRepository->find($comparableAttribute->id);
            $comparableAttribute['group_app']->name = str_replace('Fonctionnalités', 'functions', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Sécurité des données', 'data_security', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Structure tarifaire', 'data_tarif', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Interopérabilité', 'interoperability', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Conformité', 'compliance', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Accessibilité', 'Accessibility', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Support / Formation', 'support_formation', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Autres', 'others', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Thématique', 'thematique', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Utilisation', 'usage', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Certification', 'certification', $comparableAttribute['group_app']->name);
            $comparableAttribute['group_app']->name = str_replace('Thématique', 'thematique', $comparableAttribute['group_app']->name);
        }
        $comparableAttributes = $comparableAttributesApp->groupBy('group_app.name');
        return response()->json([
            'data' => $comparableAttributes,
        ]);
    }

    /**
     * Method for customers to get products in comparison.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store()
    {
        $this->validate(request(), [
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $compareProduct = $this->compareItemRepository->findOneByField([
            'customer_id' => auth()->guard('customer')->user()->id,
            'product_id' => request()->input('product_id'),
        ]);

        if ($compareProduct) {
            return (new JsonResource([
                'message' => trans('shop::app.compare.already-added'),
            ]))
                ->response()
                ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $this->compareItemRepository->create([
            'customer_id' => auth()->guard('customer')->user()->id,
            'product_id' => request()->input('product_id'),
        ]);

        return new JsonResource([
            'message' => trans('shop::app.compare.item-add-success'),
        ]);
    }

    /**
     * Method to remove the item from compare list.
     */
    public function destroy(): JsonResource
    {
        $success = $this->compareItemRepository->deleteWhere([
            'product_id' => request()->input('product_id'),
            'customer_id' => auth()->guard('customer')->user()->id,
        ]);

        if (!$success) {
            return new JsonResource([
                'message' => trans('shop::app.compare.remove-error'),
            ]);
        }

        if ($customer = auth()->guard('customer')->user()) {
            $productIds = $this->compareItemRepository->findByField('customer_id', $customer->id)->pluck('product_id')->toArray();
        }

        $products = $this->productRepository->whereIn('id', $productIds ?? [])->get();

        return new JsonResource([
            'data' => CompareItemResource::collection($products),
            'message' => trans('shop::app.compare.remove-success'),
        ]);
    }

    /**
     * Method for remove all items from compare list
     */
    public function destroyAll(): JsonResource
    {
        $success = $this->compareItemRepository->deleteWhere([
            'customer_id' => auth()->guard('customer')->user()->id,
        ]);

        if (!$success) {
            return new JsonResource([
                'message' => trans('shop::app.compare.remove-error'),
            ]);
        }

        return new JsonResource([
            'message' => trans('shop::app.compare.remove-all-success'),
        ]);
    }
    public function get_products(): JsonResource
    {
        // Retrieve product IDs from the request (typically sent from localStorage in the frontend)
        $productIds = request()->input('product_ids') ?? [];

        // Fetch the products from the database using the provided product IDs
        $products = $this->productRepository->whereIn('id', $productIds)->get();

        // Create an array to store products with their categories
        $productsWithCategories = $products->map(function ($product) {
            // Fetch the categories for each product
            $categories = $this->productRepository->getCategoriesByProductId($product->id);

            // Add the categories to the product data
            return $product->setAttribute('categories', $categories);
        });

        // Return the products with categories as a JSON resource collection
        return CompareItemResource::collection($productsWithCategories);
    }

    public function get_products_new()
    {
        // Retrieve product IDs from the request (typically sent from localStorage in the frontend)
        $productIds = request()->input('product_ids') ?? [];

        // Fetch unique products from the ProductFlat model based on the provided product IDs
        $products = ProductFlat::whereIn('product_id', $productIds)
            ->select('product_id', 'id', 'name', 'description')
            ->groupBy('product_id') // Group by product_id to ensure uniqueness
            ->get();

        // If no products are found, return an empty data array
        if ($products->isEmpty()) {
            return response()->json(['data' => []]);
        }

        // Create an array to include product data with categories and societies
        $productWithCategories = $products->map(function ($product) {
            // Fetch categories and societies for each product
            $categories = $this->productRepository->getCategoriesByProductId($product->product_id);
            $socites = $this->productRepository->getSociete($product->product_id);
            $url = ProductFlat::where('name', $product->name)->first();
            return [
                'id' => $product->id,
                'name' => $product->name,
                'url' => $url ? env('APP_URL') . '/' . $url->url_key : null,
                'description' => $product->description,
                'categories' => $categories,
                'product_id' => $product->product_id,
                'socites' => $socites,
            ];
        });

        // Return the product data wrapped in a "data" key
        return response()->json(['data' => $productWithCategories]);
    }
}