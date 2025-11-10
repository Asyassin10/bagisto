<?php

namespace Webkul\Admin\Http\Controllers\Catalog;

use App\Notifications\NotififcationProductStatusChangedToActif;
use App\Notifications\NotififcationProductStatusChangedToNonActif;
use App\Notifications\ToAdminProductHasBeenChanged;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Webkul\Admin\DataGrids\Catalog\ProductDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\InventoryRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Admin\Http\Requests\ProductForm;
use Webkul\Admin\Http\Resources\AttributeResource;
use Webkul\Admin\Http\Resources\ProductResource;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Core\Rules\Slug;
use Webkul\Product\Helpers\ProductType;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductFlat;
use Webkul\User\Models\Admin;

class ProductController extends Controller
{
    /*
     * Using const variable for status
     */
    const ACTIVE_STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected ProductDownloadableLinkRepository $productDownloadableLinkRepository,
        protected ProductDownloadableSampleRepository $productDownloadableSampleRepository,
        protected ProductInventoryRepository $productInventoryRepository,
        protected ProductRepository $productRepository,
        protected AttributeRepository $attributeRepository,
        protected AttributeOptionRepository $attributeOptionRepository
        //  protected AttributeFamilyRepository $attributeFamilyRepository,

    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(ProductDataGrid::class)->process();
        }

        $families = $this->attributeFamilyRepository->all()->reject(function ($family) {
            return $family->name === 'Défaut';
        });

        return view('admin::catalog.products.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $families = $this->attributeFamilyRepository->all();

        $configurableFamily = null;

        if ($familyId = request()->get('family')) {
            $configurableFamily = $this->attributeFamilyRepository->find($familyId);
        }

        return view('admin::catalog.products.create', compact('families', 'configurableFamily'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateInvalidateProductToggle(int $product_id)
    {
        // Validate the request data
        /*  $data = request()->validate([
            'product_id' => 'required|exists:products,id',
        ]); */

        // Retrieve the product ID from the validated data
        //    $product_id = $data['product_id'];

        // Find the product using the repository
        $products = ProductFlat::where("product_id", $product_id)->get();
        foreach ($products as $product) {

            $product->is_valid_by_admin = !$product->is_valid_by_admin;  // Assuming the field is named 'valid'
            $product->save();
        }

        session()->flash('success', trans('admin::app.catalog.products.update-success'));
        return redirect()->route("admin.catalog.products.index");
        // return new JsonResponse(['message' => 'Product toggle validation and invalidation logic is not implemented yet.']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $this->validate(request(), [
            //'type'                => 'required',
            'attribute_family_id' => 'required',
            // 'sku'                 => ['required', 'unique:products,sku', new Slug],
            'super_attributes' => 'array|min:1',
            'super_attributes.*' => 'array|min:1',
        ]);

        if (
            ProductType::hasVariants("virtual")
            && !request()->has('super_attributes')
        ) {
            $configurableFamily = $this->attributeFamilyRepository
                ->find(request()->input('attribute_family_id'));

            return new JsonResponse([
                'data' => [
                    'attributes' => AttributeResource::collection($configurableFamily->configurable_attributes),
                ],
            ]);
        }

        Event::dispatch('catalog.product.create.before');
        $sku = Str::random(16);
        $attributeFamily = $this->attributeFamilyRepository->findOrFail(request()->input("attribute_family_id"), ['*']);

        $admin = Auth::guard("admin")->user();
        $adminId = ($admin->role_id == 2) ? $admin->parent_id : $admin->id;
        $data_product = array_merge(request()->only([
            //  'type',
            'attribute_family_id',
            // 'sku',
            'super_attributes',
            'family',
        ]), [
            'sku' => $sku,
            "admin_id" => $adminId,
            "type" => "virtual",
        ]);

        $product = $this->productRepository->create($data_product);
        $data_category = [];
        if ($attributeFamily->name == "Comptabilité - Précomptabilité") {
            /* DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 3,
            ]); */
            array_push($data_category, 3);
        }
        if ($attributeFamily->name == "Social - RH") {
            /* DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 4,
            ]); */
            array_push($data_category, 4);
        }
        if ($attributeFamily->name == "Autre") {
            /* DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 13,
            ]); */
            array_push($data_category, 13);
        }
        if ($attributeFamily->name == "Autres solutions numériques") {
            /* DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 13,
            ]); */
            array_push($data_category, 13);
        }
        if ($attributeFamily->name == "Data") {
            /*  DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 5,
            ]); */
            array_push($data_category, 5);
        }
        if ($attributeFamily->name == "Gestion interne & Commerciale") {
            /*  DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 6,
            ]); */
            array_push($data_category, 6);
        }
        if ($attributeFamily->name == "Durabilité") {
            /*  DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 7,
            ]); */
            array_push($data_category, 7);
        }
        if ($attributeFamily->name == "Juridique-Fiscal") {
            /*   DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 8,
            ]); */
            array_push($data_category, 8);
        }
        if ($attributeFamily->name == "PDP") {
            /* DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 9,
            ]); */
            array_push($data_category, 9);
        }
        if ($attributeFamily->name == "Gestion patrimoine") {
            /* DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 10,
            ]); */
            array_push($data_category, 10);
        }
        if ($attributeFamily->name == "Gestion trésorerie-financement") {
            /* DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 11,
            ]); */
            array_push($data_category, 11);
        }
        if ($attributeFamily->name == "Signature électronique, Télétransmission, archivage") {
            /*  DB::table("product_categories")->insert([
                "product_id" => $product->id,
                "category_id" => 12,
            ]); */
            array_push($data_category, 12);
        }
        $product->categories()->sync($data_category);
        // $product->categories()->sync($data['categories']);
        Event::dispatch('catalog.product.create.after', $product);

        session()->flash('success', trans('admin::app.catalog.products.create-success'));

        return new JsonResponse([
            'data' => [
                'redirect_url' => route('admin.catalog.products.edit', $product->id),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function visualize(string $slug)
    {
        $product = $this->productRepository->findBySlug($slug);

        $libele_in_second_column_include = ["Niveau de signature", "Modalité de collecte"];
        $libele_in_second_column_include_checkbox = ["Périmètre"];
        $is_congrate_partner = ProductFlat::where("product_id", $product->id)->get();
        return view('shop::products.view', compact('product', 'is_congrate_partner', "libele_in_second_column_include", "libele_in_second_column_include_checkbox"));

    }
    public function edit(int $id)
    {
        $link = url("admin/login");
        // return $link;
        $product = $this->productRepository->findOrFail($id);
        //  return $product->attribute_family->attribute_groups;
        /* $filteredCollection = $product->attribute_family->attribute_groups->reject(function ($attributeGroup) {
            return $attributeGroup->code === 'price';
        });
        return $filteredCollection; */
        return view('admin::catalog.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $request, int $id)
    {


        $data = request()->all();

        Log::info('Request Data:', $data);
        $rules = [];
        $attrs = [];
        foreach ($data as $key => $value) {
            $attr = $this->attributeRepository->where("code", $key)->first();
            $attrs[] = $attr;
            if (!is_null($attr) && !is_null($attr->max_length)) {

                if ($attr->type == "price" || str_contains($attr->validations, "numeric")) {
                    if (isset($attr->max_length) && !is_null($attr->max_length) && $attr->max_length > 0) {
                        $rules[$key] = 'numeric|max:' . $attr->max_length;
                    }
                } else {

                    $rules[$key] = 'max:' . $attr->max_length;
                }
            }
        }
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            //    dd($validator->errors()); // Dump the validation errors

            return back()->withErrors($validator)->withInput();
        }

        $RawSelectedOPtionOnSignatureElectronique = null;
        if (isset($data["KqU1t7Fusp5zHgvi"])) {
            if (is_array(value: $data["KqU1t7Fusp5zHgvi"])) {
                $RawSelectedOPtionOnSignatureElectronique = $this->attributeOptionRepository->find($data["KqU1t7Fusp5zHgvi"][0]);
            } else {
                $RawSelectedOPtionOnSignatureElectronique = $this->attributeOptionRepository->find($data["KqU1t7Fusp5zHgvi"]);
            }
            if (!is_null($RawSelectedOPtionOnSignatureElectronique) && $RawSelectedOPtionOnSignatureElectronique->admin_name == "non") {


                if (
                    is_array($data) && array_key_exists(
                        "JOL1ipxXeZLdZWyr",
                        $data
                    )
                ) {
                    $data["JOL1ipxXeZLdZWyr"] = "";
                }



                if (
                    is_array($data) && array_key_exists(
                        "xxdxsw",
                        $data
                    )
                ) {
                    $data["xxdxsw"] = "";
                }



                if (
                    is_array($data) && array_key_exists(
                        "70Xi7sBYn2Bdm7cz",
                        array: $data
                    )
                ) {
                    $data["70Xi7sBYn2Bdm7cz"] = "";
                }



                if (
                    is_array($data) && array_key_exists(
                        "AEqvw4LAO7KFqBM9",
                        array: $data
                    )
                ) {
                    $data["AEqvw4LAO7KFqBM9"] = "";
                }



                if (
                    is_array($data) && array_key_exists(
                        "wdWMAJYdlPV5zFFq",
                        array: $data
                    )
                ) {
                    $data["wdWMAJYdlPV5zFFq"] = "";
                }
            }
        }
        $RawSelectedOfGestionElectroniqueDesDocuments = null;
        if (isset($data["uQj9O9T0mj6ZakND"])) {
            if (is_array(value: $data["uQj9O9T0mj6ZakND"])) {
                $RawSelectedOfGestionElectroniqueDesDocuments = $this->attributeOptionRepository->find($data["uQj9O9T0mj6ZakND"][0]);
            } else {
                $RawSelectedOfGestionElectroniqueDesDocuments = $this->attributeOptionRepository->find($data["uQj9O9T0mj6ZakND"]);
            }
            if (!is_null($RawSelectedOfGestionElectroniqueDesDocuments) && $RawSelectedOfGestionElectroniqueDesDocuments->admin_name == "non") {

                if (
                    is_array($data) && array_key_exists(
                        "6ABF8bb0WrLQHvkT",
                        $data
                    )
                ) {
                    $data["6ABF8bb0WrLQHvkT"] = "";
                }



                if (
                    is_array($data) && array_key_exists(
                        "kELSkDcAS3TNauSX",
                        $data
                    )
                ) {
                    $data["kELSkDcAS3TNauSX"] = "";
                }
            }
        }

        // dd($data);
        $attributes_data = [];
        $previousAttr = null; // Variable to keep track of the previous record
        foreach ($data as $key => $value) {
            $attr = $this->attributeRepository->where("code", $key)->first();
            if (!is_null(value: $attr) && stripos($attr->admin_name, needle: "si ")) {
                if (!is_null($previousAttr) && isset($previousAttr)) {
                    if (($previousAttr->type == "checkbox" || $previousAttr->type == "select") && $attr->type == "text") {
                        $previousAttrAnswer = $data[$previousAttr ? $previousAttr->code : null];
                        $selectedOption = null;
                        if (!is_null($previousAttrAnswer)) {
                            if (is_array($previousAttrAnswer)) {
                                $selectedOption = $this->attributeOptionRepository->find($previousAttrAnswer[0]);
                            } else {
                                $selectedOption = $this->attributeOptionRepository->find($previousAttrAnswer);
                            }
                            if (stripos($attr->admin_name, "non")) {
                                if ($selectedOption->admin_name == "oui" && !is_null($previousAttr)) {
                                    // unset($data[$attr->code]);
                                    $data[$attr->code] = "";
                                }
                            } else if (stripos($attr->admin_name, "oui")) {
                                if ($selectedOption->admin_name == "non" && !is_null($previousAttr)) {
                                    // unset($data[$attr->code]);
                                    $data[$attr->code] = "";
                                }
                            }
                        }
                    }
                }


            }
            if (!is_null($attr)) {
                $previousAttr = $attr;
            }
        }


        $defaultData = array_merge($data, [
            "visible_individually" => "1",
            "status" => request()->has('status') ? request()->input('status') : 0 // Set status to 1 if present in request, otherwise 0
        ]);
        $admins = Admin::where('role_id', 1)->get();
        $product_to_update = $this->productRepository->find($id);

        $status_request = $defaultData["status"];



        // Get all request data except unnecessary fields
        $requestData = request()->except(['_token', '_method', 'channel', 'locale']);

        // Get the current product data as an array
        $currentProductData = $product_to_update->toArray();

        // Log request and product data for debugging
        Log::info('Request Data:', $requestData);
        Log::info('Current Product Data:', $currentProductData);

        // Get additional data for the product using the productViewHelper
        $customAttributeValues = app('Webkul\Product\Helpers\View')->getAdditionalData($product_to_update);

        // Filter out unwanted attribute groups, but include 'name' and 'description'
        $filteredAttributes = $product_to_update->attribute_family->attribute_groups->reject(function ($attributeGroup) {
            return in_array($attributeGroup->code, [
                'inventories',
                'price',
                'general',
                'meta_description',
                'settings'
            ]);
        })->flatMap(function ($attributeGroup) {
            return $attributeGroup->custom_attributes;
        });

        // Manually include 'name' and 'description' in the filtered attributes
        $filteredAttributes = $filteredAttributes->merge([
            (object) ['code' => 'name', 'type' => 'text'],
            (object) ['code' => 'description', 'type' => 'textarea']
        ]);

        // Check if other fields (excluding status) have changed
        $otherFieldsChanged = false;
        foreach ($filteredAttributes as $attribute) {
            $key = $attribute->code;

            // Check if the key exists in the request data and current product data
            if (isset($requestData[$key]) && isset($currentProductData[$key])) {
                // Normalize request data: Convert arrays to strings
                $requestValue = is_array($requestData[$key]) ? implode(',', $requestData[$key]) : $requestData[$key];

                // Normalize current product data: Convert arrays to strings
                $currentValue = is_array($currentProductData[$key]) ? implode(',', $currentProductData[$key]) : $currentProductData[$key];

                // Compare the values
                if ($requestValue != $currentValue) {
                    $otherFieldsChanged = true;
                    Log::info("Field changed: $key", [
                        'old_value' => $currentValue,
                        'new_value' => $requestValue,
                    ]);
                    break;
                }
            } elseif (isset($requestData[$key])) {
                $otherFieldsChanged = true;
                Log::info("New field added: $key", ['new_value' => $requestData[$key]]);
                break;
            }
        }
        $admin_to_send = Admin::where("id", $product_to_update->admin_id)->first();

        if ($product_to_update->status != $status_request && !$otherFieldsChanged) {
            // Only status changed
            $this->productRepository->update($defaultData, $id);
            if ($status_request == 1) {
                foreach ($admins as $admin) {
                    $admin->notify(instance: new NotififcationProductStatusChangedToActif($product_to_update, $admin_to_send));
                }
            } else {
                foreach ($admins as $admin) {
                    $admin->notify(instance: new NotififcationProductStatusChangedToNonActif($product_to_update, $admin_to_send));
                }
            }

        } elseif ($otherFieldsChanged) {
            // Other fields changed (with or without status change)
            // Save all changes
            $should_validate = request()->input(key: 'should_validate');
            if ($should_validate == "non") {
                $defaultData["status"] = 0;

            } else {

                $defaultData["status"] = 1;
            }
            $this->productRepository->update($defaultData, $id);
            foreach ($admins as $admin) {
                $admin->notify(new ToAdminProductHasBeenChanged($product_to_update, $admin_to_send));
            }
        }



        // Dispatch events and update the product
        Event::dispatch('catalog.product.update.before', $id);

        $product = $this->productRepository->update($defaultData, $id);

        Event::dispatch('catalog.product.update.after', $product);
        $status = request()->input(key: 'status');
        $just_ignore_status = request()->input(key: 'just_ignore_status');
        $should_validate = request()->input(key: 'should_validate');
        if ($status == 0 && $just_ignore_status == "non" && $should_validate != "non") {
            return redirect()->back()->with(["show_modal" => "ok"]);
        }
        session()->flash('success', trans('admin::app.catalog.products.update-success'));
        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Update inventories.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateInventories(InventoryRequest $inventoryRequest, int $id)
    {
        $product = $this->productRepository->findOrFail($id);

        Event::dispatch('catalog.product.update.before', $id);

        $this->productInventoryRepository->saveInventories(request()->all(), $product);

        Event::dispatch('catalog.product.update.after', $product);

        return response()->json([
            'message' => __('admin::app.catalog.products.saved-inventory-message'),
            'updatedTotal' => $this->productInventoryRepository->where('product_id', $product->id)->sum('qty'),
        ]);
    }

    /**
     * Uploads downloadable file.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadLink(int $id)
    {
        return response()->json(
            $this->productDownloadableLinkRepository->upload(request()->all(), $id)
        );
    }

    /**
     * Copy a given Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function copy(int $id)
    {
        try {
            Event::dispatch('catalog.product.create.before');

            $product = $this->productRepository->copy($id);

            Event::dispatch('catalog.product.create.after', $product);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->to(route('admin.catalog.products.index'));
        }

        session()->flash('success', trans('admin::app.catalog.products.product-copied'));

        return redirect()->route('admin.catalog.products.edit', $product->id);
    }

    /**
     * Uploads downloadable sample file.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadSample(int $id)
    {
        return response()->json(
            $this->productDownloadableSampleRepository->upload(request()->all(), $id)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            Event::dispatch('catalog.product.delete.before', $id);

            $this->productRepository->delete($id);

            Event::dispatch('catalog.product.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.catalog.products.delete-success'),
            ]);
        } catch (\Exception $e) {
            report($e);
        }

        return new JsonResponse([
            'message' => trans('admin::app.catalog.products.delete-failed'),
        ], 500);
    }

    /**
     * Mass delete the products.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $productIds = $massDestroyRequest->input('indices');

        try {
            foreach ($productIds as $productId) {
                $product = $this->productRepository->find($productId);

                if (isset($product)) {
                    Event::dispatch('catalog.product.delete.before', $productId);

                    $this->productRepository->delete($productId);

                    Event::dispatch('catalog.product.delete.after', $productId);
                }
            }

            return new JsonResponse([
                'message' => trans('admin::app.catalog.products.index.datagrid.mass-delete-success'),
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function massSetPartnetAgreed(MassDestroyRequest $massDestroyRequest, int $is_congrate_partner): JsonResponse
    {
        $productIds = $massDestroyRequest->input('indices');

        try {
            foreach ($productIds as $productId) {
                $product = $this->productRepository->find($productId);

                if (isset($product)) {
                    Event::dispatch('catalog.product.delete.before', $productId);

                    $this->productRepository->updateWithoutNotif(id: $product->id, is_congrate_partner: $is_congrate_partner == 1 ? true : false);

                    Event::dispatch('catalog.product.delete.after', $productId);
                }
            }

            return new JsonResponse([
                'message' => trans('admin::app.catalog.products.index.datagrid.mass-delete-success'),
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Mass update the products.
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): JsonResponse
    {
        $productIds = $massUpdateRequest->input('indices');

        foreach ($productIds as $productId) {
            Event::dispatch('catalog.product.update.before', $productId);

            $product = $this->productRepository->update([
                'status' => $massUpdateRequest->input('value'),
            ], $productId, ['status']);

            Event::dispatch('catalog.product.update.after', $product);
        }

        return new JsonResponse([
            'message' => trans('admin::app.catalog.products.index.datagrid.mass-update-success'),
        ], 200);
    }

    /**
     * To be manually invoked when data is seeded into products.
     *
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {
        Event::dispatch('products.datagrid.sync', true);

        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Result of search product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        $results = [];

        $searchEngine = 'database';

        if (
            core()->getConfigData('catalog.products.search.engine') == 'elastic'
            && core()->getConfigData('catalog.products.search.admin_mode') == 'elastic'
        ) {
            $searchEngine = 'elastic';

            $indexNames = core()->getAllChannels()->map(function ($channel) {
                return 'products_' . $channel->code . '_' . app()->getLocale() . '_index';
            })->toArray();
        }

        $products = $this->productRepository
            ->setSearchEngine($searchEngine)
            ->getAll([
                'index' => $indexNames ?? null,
                'name' => request('query'),
                'sort' => 'created_at',
                'order' => 'desc',
            ]);

        return ProductResource::collection($products);
    }

    /**
     * Download image or file.
     *
     * @param  int  $productId
     * @param  int  $attributeId
     * @return \Illuminate\Http\Response
     */
    public function download($productId, $attributeId)
    {
        $productAttribute = $this->productAttributeValueRepository->findOneWhere([
            'product_id' => $productId,
            'attribute_id' => $attributeId,
        ]);

        return Storage::download($productAttribute['text_value']);
    }

    public function deleteById($id)
    {
        try {
            $product = $this->productRepository->find($id);

            if ($product) {
                Event::dispatch('catalog.product.delete.before', $id);

                $this->productRepository->delete($id);

                Event::dispatch('catalog.product.delete.after', $id);

                return redirect()->route('admin.catalog.products.index')
                    ->with('success', trans('admin::app.catalog.products.delete-success'));
            }

            return redirect()->route('admin.catalog.products.index')
                ->with('error', trans('admin::app.catalog.products.index.datagrid.delete-failed'));
        } catch (\Exception $e) {
            return redirect()->route('admin.catalog.products.index')
                ->with('error', $e->getMessage());
        }
    }

}
