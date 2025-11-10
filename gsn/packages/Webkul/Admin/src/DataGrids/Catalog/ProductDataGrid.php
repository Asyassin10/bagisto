<?php

namespace Webkul\Admin\DataGrids\Catalog;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Core\Facades\ElasticSearch;
use Webkul\DataGrid\DataGrid;
use Webkul\User\Models\Admin;
use Webkul\User\Repositories\AdminRepository;

class ProductDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'product_id';

    /**
     * Constructor for the class.
     *
     * @return void
     */
    public function __construct(protected AttributeFamilyRepository $attributeFamilyRepository, protected AdminRepository $adminRepository) {}

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder(bool $is_filter_by_editeur_active = false)
    {
        $tablePrefix = DB::getTablePrefix();

        /**
         * Query Builder to fetch records from `product_flat` table
         */
        $queryBuilder = DB::table('product_flat')
            ->distinct()
            ->leftJoin('attribute_families as af', 'product_flat.attribute_family_id', '=', 'af.id')
            ->leftJoin('product_inventories', 'product_flat.product_id', '=', 'product_inventories.product_id')
            ->leftJoin('product_images', 'product_flat.product_id', '=', 'product_images.product_id')
            ->leftJoin('product_categories as pc', 'product_flat.product_id', '=', 'pc.product_id')
            ->leftJoin('products as p', 'product_flat.product_id', '=', 'p.id')
            ->leftJoin('admins as ad', 'p.admin_id', '=', 'ad.id')
            ->leftJoin('category_translations as ct', function ($leftJoin) {
                $leftJoin->on('pc.category_id', '=', 'ct.category_id')
                    ->where('ct.locale', app()->getLocale());
            })
            ->select(
                'product_flat.locale',
                'product_flat.channel',
                'product_images.path as base_image',
                'pc.category_id',
                'ct.name as category_name',
                'product_flat.product_id',
                'product_flat.sku',
                'product_flat.is_valid_by_admin',
                'p.is_congrate_partner',
                'p.admin_id',
                'p.id',

                'product_flat.name',
                'product_flat.type',
                'product_flat.status',
                //'product_flat.price',
                'product_flat.url_key',
                'product_flat.visible_individually',
                'af.name as attribute_family',
                "ad.name as admin_name"
            )
            ->addSelect(DB::raw('SUM(DISTINCT ' . $tablePrefix . 'product_inventories.qty) as quantity'))
            ->addSelect(DB::raw('COUNT(DISTINCT ' . $tablePrefix . 'product_images.id) as images_count'))
            ->where('product_flat.locale', app()->getLocale())
            ->groupBy('product_flat.product_id');
        // if ($is_filter_by_editeur_active) {
        $admin = Auth::guard("admin")->user();
        if ($admin->role_id == 3) {
            $queryBuilder->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
                ->where('products.admin_id', $admin->id);
        }
        if ($admin->role_id == 2) {

            $queryBuilder->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
                ->where('products.admin_id', $admin->parent_id);
        }
        //   }
        $this->addFilter('product_id', 'product_flat.product_id');
        $this->addFilter('channel', 'product_flat.channel');
        $this->addFilter('locale', 'product_flat.locale');
        $this->addFilter('name', 'product_flat.name');
        $this->addFilter('type', queryColumn: 'product_flat.type');
        $this->addFilter('status', 'product_flat.status');
        $this->addFilter('attribute_family', 'af.id');
        $this->addFilter('is_congrate_partner', 'p.is_congrate_partner');
        $this->addFilter('admin_id', 'p.admin_id');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $channels = core()->getAllChannels();

        if ($channels->count() > 1) {
            $this->addColumn([
                'index' => 'channel',
                'label' => trans('admin::app.catalog.products.index.datagrid.channel'),
                'type' => 'string',
                'filterable' => true,
                'filterable_type' => 'dropdown',
                'filterable_options' => collect($channels)
                    ->map(fn($channel) => ['label' => $channel->name, 'value' => $channel->code])
                    ->values()
                    ->toArray(),
                'sortable' => true,
                'visibility' => false,
            ]);
        }

        $this->addColumn([
            'index' => 'name',
            'label' => trans('admin::app.catalog.products.index.datagrid.name'),
            'type' => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable' => true,
        ]);
        $requestedParams = $this->validatedRequest();

        if (isset($requestedParams['export']) && (bool) $requestedParams['export']) {
            $this->addColumn([
                'index' => 'admin_name',
                'label' => "Nom de l'éditeur",
                'type' => 'string',
                'searchable' => true,
                'filterable' => true,
                'sortable' => true,
            ]);
        }
        /*  */

        $this->addColumn([
            'index' => 'is_valid_by_admin',
            'label' => trans('admin::app.global.is_active'),
            'type' => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable' => true,
        ]);

        /*

     */
        $this->addColumn([
            'index' => 'sku',
            'label' => trans('admin::app.catalog.products.index.datagrid.sku'),
            'type' => 'string',
            'filterable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'attribute_family',
            'label' => trans('admin::app.catalog.products.index.datagrid.attribute-family'),
            'type' => 'string',
            'filterable' => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => $this->attributeFamilyRepository->all(['name as label', 'id as value'])->toArray(),
        ]);

        $this->addColumn([
            'index' => 'base_image',
            'label' => trans('admin::app.catalog.products.index.datagrid.image'),
            'type' => 'string',
        ]);

        /*  $this->addColumn([
            'index'      => 'price',
            'label'      => trans('admin::app.catalog.products.index.datagrid.price'),
            'type'       => 'string',
            'filterable' => true,
            'sortable'   => true,
        ]); */

        /*         $this->addColumn([
            'index'      => 'quantity',
            'label'      => trans('admin::app.catalog.products.index.datagrid.qty'),
            'type'       => 'integer',
            'sortable'   => true,
        ]); */

        $this->addColumn([
            'index' => 'product_id',
            'label' => trans('admin::app.catalog.products.index.datagrid.id'),
            'type' => 'integer',
            'filterable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => trans('admin::app.catalog.products.index.datagrid.status'),
            'type' => 'boolean',
            'filterable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'category_name',
            'label' => trans('admin::app.catalog.products.index.datagrid.category'),
            'type' => 'string',
        ]);

        $this->addColumn([
            'index' => 'type',
            'label' => trans('admin::app.catalog.products.index.datagrid.type'),
            'type' => 'string',
            'filterable' => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => collect(config('product_types'))
                ->map(fn($type) => ['label' => trans($type['name']), 'value' => $type['key']])
                ->values()
                ->toArray(),
            'sortable' => true,
        ]);
        $this->addColumn([
            'index' => 'is_congrate_partner',
            'label' => "Partenaire congrès", // Or just "Featured" directly
            'type' => 'boolean',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true,
        ]);

        /*   $this->addColumn([
              'index' => 'admin_id',
              'label' => "L'editeur",
              'type' => 'string',
              'filterable' => true,
              'filterable_type' => 'dropdown',
              'filterable_options' => $this->adminRepository->all(['name as label', 'id as value'])->toArray(),
          ]); */
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (bouncer()->hasPermission('catalog.products.copy')) {
            $this->addAction([
                'icon' => 'icon-copy',
                "is_icon" => true,
                'title' => trans('admin::app.catalog.products.index.datagrid.copy'),
                'method' => 'GET',
                'url' => function ($row) {
                    return route('admin.catalog.products.copy', $row->product_id);
                },
            ]);
        }
        /*  if (auth()->guard('admin')->user()->role_id == 1) {
            $this->addAction([
                'icon'   => 'icon-copy',
                'title'  => trans('admin::app.global.activare_desativate'),
                'method' => 'GET',
                "is_icon" => false,

                'url'    => function ($row) {
                    return route('admin.catalog.products.validateInvalidateProductToggle', $row->product_id);
                },
            ]);
        } */

        if (bouncer()->hasPermission('catalog.products.edit')) {
            $this->addAction([
                'icon' => 'icon-sort-right',
                'title' => trans('admin::app.catalog.products.index.datagrid.edit'),
                'method' => 'GET',
                "is_icon" => true,

                'url' => function ($row) {
                    $filteredChannel = request()->input('filters.channel')[0] ?? null;

                    return route('admin.catalog.products.edit', [
                        'id' => $row->product_id,
                        'channel' => $filteredChannel,
                    ]);
                },
            ]);
        }
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('catalog.products.delete')) {
            $this->addMassAction([
                'title' => trans('admin::app.catalog.products.index.datagrid.delete'),
                'url' => route('admin.catalog.products.mass_delete'),
                'method' => 'POST',
            ]);
        }
        /*   $this->addMassAction(massAction: [
            //
            'title' => "Ajouter comme congrès partenaire",
            'url' => route('admin.catalog.products.mass_set_congre_partner', ["is_congrate_partner" => 1]),
            'method' => 'POST',
        ]);
        $this->addMassAction(massAction: [
            //
            'title' => "Définir comme non partenaire",
            'url' => route('admin.catalog.products.mass_set_congre_partner', ["is_congrate_partner" => 2]),
            'method' => 'POST',
        ]); */

        if (bouncer()->hasPermission('catalog.products.edit')) {
            $this->addMassAction([
                'title' => trans('admin::app.catalog.products.index.datagrid.update-status'),
                'url' => route('admin.catalog.products.mass_update'),
                'method' => 'POST',
                'options' => [
                    [
                        'label' => trans('admin::app.catalog.products.index.datagrid.active'),
                        'value' => 1,
                    ],
                    [
                        'label' => trans('admin::app.catalog.products.index.datagrid.disable'),
                        'value' => 0,
                    ],
                ],
            ]);
        }
    }



    /**
     * Process export request.
     */
    protected function processExportRequest(array $requestedParams): void
    {

        $this->dispatchEvent('process_request.export.before', $this);

        $this->setExportFile($requestedParams['format']);

        $this->dispatchEvent('process_request.export.after', $this);
    }
    /**
     * Process request.
     */
    protected function processRequest(): void
    {

        /*   Log::channel(channel: "personnal")->info('Admin IDs for search: ' . implode(',', [20, 20, 20])); */

        if (
            core()->getConfigData('catalog.products.search.engine') != 'elastic'
            || core()->getConfigData('catalog.products.search.admin_mode') != 'elastic'
        ) {
            parent::processRequest();

            return;
        }
        $params = $this->validatedRequest();

        if (isset($params['filters']['all'])) {

            parent::processRequest();

            return;
        }

        /**
         * Store all request parameters in this variable; avoid using direct request helpers afterward.
         */

        if (isset($params['export']) && (bool) $params['export']) {
            parent::processRequest();

            return;
        }

        $this->dispatchEvent('process_request.before', $this);

        $pagination = $params['pagination'];

        $channelCodes = request()->input('filters.channel') ?? core()->getAllChannels()->pluck('code')->toArray();

        $indexNames = collect($channelCodes)->map(function ($channelCode) {
            return 'products_' . $channelCode . '_' . app()->getLocale() . '_index';
        })->toArray();

        $results = Elasticsearch::search([
            'index' => $indexNames,
            'body' => [
                'from' => ($pagination['page'] * $pagination['per_page']) - $pagination['per_page'],
                'size' => $pagination['per_page'],
                'stored_fields' => [],
                'query' => [
                    'bool' => $this->getElasticFilters($params['filters'] ?? []) ?: new \stdClass(),
                ],
                'sort' => $this->getElasticSort($params['sort'] ?? []),
            ],
        ]);

        $ids = collect($results['hits']['hits'])->pluck('_id')->toArray();

        $this->queryBuilder->whereIn('product_flat.product_id', $ids)
            ->orderBy(DB::raw('FIELD(product_flat.product_id, ' . implode(',', $ids) . ')'));

        $total = $results['hits']['total']['value'];

        $this->paginator = new LengthAwarePaginator(
            $total ? $this->queryBuilder->get() : [],
            $total,
            $pagination['per_page'],
            $pagination['page'],
            [
                'path' => request()->url(),
                'query' => [],
            ]
        );

        $this->dispatchEvent('process_request.after', $this);
    }

    /**
     * Process request.
     */
    protected function getElasticFilters($params): array
    {
        $filters = [];

        foreach ($params as $attribute => $value) {
            if (in_array($attribute, ['channel', 'locale'])) {
                continue;
            }

            if ($attribute == 'all') {
                $attribute = 'name';
            }

            $filters['filter'][] = $this->getFilterValue($attribute, $value);
        }

        return $filters;
    }

    /**
     * Return applied filters
     */
    public function getFilterValue(mixed $attribute, mixed $values): array
    {
        switch ($attribute) {
            case 'product_id':
                return [
                    'terms' => [
                        'id' => $values,
                    ],
                ];

            case 'attribute_family':
                return [
                    'terms' => [
                        'attribute_family_id' => $values,
                    ],
                ];

            case 'sku':
            case 'name':
                $filters = [];

                foreach ($values as $value) {
                    $filters['bool']['should'][] = [
                        'match_phrase_prefix' => [
                            $attribute => $value,
                        ],
                    ];
                }

                return $filters;

            default:
                return [
                    'terms' => [
                        $attribute => $values,
                    ],
                ];
        }
    }

    /**
     * Process request.
     */
    protected function getElasticSort($params): array
    {
        $sort = $params['column'] ?? $this->primaryColumn;

        if ($sort == 'type') {
            $sort .= '.keyword';
        }

        if ($sort == 'name') {
            $sort .= '.keyword';
        }

        if ($sort == 'attribute_family') {
            $sort .= '_id';
        }

        if ($sort == 'product_id') {
            $sort = 'id';
        }

        return [
            $sort => [
                'order' => $params['order'] ?? $this->sortOrder,
            ],
        ];
    }
}
