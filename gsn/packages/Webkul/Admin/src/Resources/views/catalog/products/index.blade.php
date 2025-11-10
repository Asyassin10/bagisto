<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.catalog.products.index.title')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('admin::app.catalog.products.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <x-admin::datagrid.export :src="route('admin.catalog.products.index')" />

            {!! view_render_event('bagisto.admin.catalog.products.create.before') !!}

            @if (bouncer()->hasPermission('catalog.products.create'))
                <v-create-product-form>
                    <button type="button" class="primary-button">
                        @lang('admin::app.catalog.products.index.create-btn')
                    </button>
                </v-create-product-form>
            @endif

            {!! view_render_event('bagisto.admin.catalog.products.create.after') !!}
        </div>
    </div>

    {!! view_render_event('bagisto.admin.catalog.products.list.before') !!}

    <!-- Datagrid -->
    <x-admin::datagrid :src="route('admin.catalog.products.index')" :isMultiRow="true">
        <!-- Datagrid Header -->
        @php
            $hasPermission =
                bouncer()->hasPermission('catalog.products.edit') ||
                bouncer()->hasPermission('catalog.products.delete');
        @endphp

        <template
            #header="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="isLoading">
                <x-admin::shimmer.datagrid.table.head :isMultiRow="true" />
            </template>

            <template v-else>

                <div
                    class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 items-center border-b px-4 py-2.5 dark:border-gray-800">
                    <div class="flex select-none items-center gap-2.5"
                        v-for="(columnGroup, index) in [['name', 'sku','admin_name' ,'attribute_family','is_valid_by_admin','is_congrate_partner','url_key'], ['base_image', 'quantity', 'product_id'], ['status', 'category_name', 'type']]">
                        @if ($hasPermission)
                            <label class="flex w-max cursor-pointer select-none items-center gap-1"
                                for="mass_action_select_all_records" v-if="! index">
                                <input type="checkbox" name="mass_action_select_all_records"
                                    id="mass_action_select_all_records" class="peer hidden"
                                    :checked="['all', 'partial'].includes(applied.massActions.meta.mode)"
                                    @change="selectAll">

                                <span class="icon-uncheckbox cursor-pointer rounded-md text-2xl"
                                    :class="[
                                        applied.massActions.meta.mode === 'all' ?
                                        'peer-checked:icon-checked peer-checked:text-blue-600' : (
                                            applied.massActions.meta.mode === 'partial' ?
                                            'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                        ),
                                    ]">
                                </span>
                            </label>
                        @endif

                        <p class="text-gray-600 dark:text-gray-300">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="column in columnGroup">
                                    <span class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'font-medium text-gray-800 dark:text-white': applied.sort.column == column,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': available
                                                .columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            available.columns.find(columnTemp => columnTemp.index === column)?.sortable ? sort(available.columns.find(columnTemp => columnTemp.index === column)): {}
                                        ">
                                        @{{ available.columns.find(columnTemp => columnTemp.index === column)?.label }}
                                    </span>
                                </template>
                            </span>

                            <i class="align-text-bottom text-base text-gray-800 dark:text-white ltr:ml-1.5 rtl:mr-1.5"
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat' : 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"></i>
                        </p>
                    </div>
                </div>
            </template>
        </template>

        <template
            #body="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="isLoading">
                <x-admin::shimmer.datagrid.table.body :isMultiRow="true" />
            </template>

            <template v-else>
                <div class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 border-b px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                    v-for="record in available.records">
                    <!-- Name, SKU, Attribute Family Columns -->

                    <div class="flex gap-2.5">
                        @if ($hasPermission)
                            <input type="checkbox" :name="`mass_action_select_record_${record.product_id}`"
                                :id="`mass_action_select_record_${record.product_id}`" :value="record.product_id"
                                class="peer hidden" v-model="applied.massActions.indices">

                            <label
                                class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-md text-2xl peer-checked:text-blue-600"
                                :for="`mass_action_select_record_${record.product_id}`"></label>
                        @endif

                        <div class="flex flex-col gap-1.5">
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                @{{ record.name }}

                            </p>
                            <p class="text-base text-gray-800 dark:text-white">
                                éditeur : @{{ record.admin_name }}

                            </p>

                            {{--                             <p class="text-gray-600 dark:text-gray-300">
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.sku-value')".replace(':sku', record.sku) }}
                            </p> --}}

                            <p class="text-gray-600 dark:text-gray-300">
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.attribute-family-value')".replace(':attribute_family', record.attribute_family) }}
                            </p>
                            <p class="text-gray-600 dark:text-gray-300">

                                <span v-if="record.is_valid_by_admin" class="text-success">
                                    @{{ "@lang('admin::app.global.is_active')" }}
                                    <span class="label-active">
                                        @{{ "@lang('admin::app.global.actif')" }}
                                    </span>
                                </span>
                                <span v-else class="text-danger">
                                    @{{ "@lang('admin::app.global.is_active')" }}
                                    <span class="label-info">
                                        @{{ "@lang('admin::app.global.non_actif')" }}
                                    </span>
                                </span>



                            </p>


                                    <p class="text-gray-600 dark:text-gray-300">

                                <span v-if="record.is_congrate_partner" class="text-success">
                                    <span class="label-active px-2 py-1">
                                      Partenaire congrès
                                    </span>
                                </span>
                            </p>
                        </div>
                    </div>


                    <!-- Image, Price, Id, Stock Columns -->
                    <div class="flex gap-1.5">
                        <div class="relative">
                            <template v-if="record.base_image">
                                <img class="max-h-[65px] min-h-[65px] min-w-[65px] max-w-[65px] rounded"
                                    :src=`{{ '/cache/small/' }}${record.base_image}` />

                                {{--   <span
                                    class="absolute bottom-px rounded-full bg-darkPink px-1.5 text-xs font-bold leading-normal text-white ltr:left-px rtl:right-px">
                                    @{{ record.images_count }}
                                </span> --}}
                            </template>

                            <template v-else>
                                <div
                                    class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert">
                                    <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">

                                    <p
                                        class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400">
                                        @lang('admin::app.catalog.products.index.datagrid.product-image')
                                    </p>
                                </div>
                            </template>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            {{--  <p class="text-base font-semibold text-gray-800 dark:text-white">
                                @{{ $admin.formatPrice(record.price) }}
                            </p> --}}

                            <!-- Parent Product Quantity -->
                            <div v-if="['configurable', 'bundle', 'grouped'].includes(record.type)">
                                {{--  <p class="text-gray-600 dark:text-gray-300">
                                    <span class="text-red-600">N/A</span>
                                </p> --}}
                            </div>

                            <div v-else>
                                {{--     <p class="text-gray-600 dark:text-gray-300" v-if="record.quantity > 0">
                                    <span class="text-green-600">
                                        @{{ "@lang('admin::app.catalog.products.index.datagrid.qty-value')".replace(':qty', record.quantity) }}
                                    </span>
                                </p>

                                <p class="text-gray-600 dark:text-gray-300" v-else>
                                    <span class="text-red-600">
                                        @lang('admin::app.catalog.products.index.datagrid.out-of-stock')
                                    </span>
                                </p> --}}
                            </div>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{-- @{{ "@lang('admin::app.catalog.products.index.datagrid.id-value')".replace(':id', record.product_id) }} --}}
                            </p>
                        </div>
                    </div>

                    <!-- Status, Category, Type Columns -->
                    <div class="flex items-center justify-between gap-x-4">
                        <div class="flex flex-col gap-1.5">
                            <p :class="[record.status ? 'label-active' : 'label-info']">
                                @{{ record.status ? "@lang('admin::app.catalog.products.index.datagrid.active')" : "@lang('admin::app.catalog.products.index.datagrid.disable')" }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @{{ record.category_name ?? 'N/A' }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{--  @{{ record.type }} --}}
                            </p>
                        </div>

                        <div class="flex items-center gap-1.5">
                            <a v-for="action in record.actions" :href="action.url" class="flex">
                                <!-- If action.icon is 'icon-copy', render the custom SVG -->
                                <span v-if="action.icon === 'icon-copy'"
                                    class="cursor-pointer rounded-md p-2 transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                                    title="Dupliquer le logiciel"> <!-- Tooltip for copy icon -->
                                    <svg class="svg-icon"
                                        style="width: 1.5rem; height: 1.5rem; vertical-align: middle; fill: currentColor;"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M793.4 241.8h-20.8V232c0-92.8-74.5-168.3-166-168.3h-376c-91.5 0-166 75.5-166 168.3v381.2c0 92.8 74.5 168.3 166 168.3h20.8v9.8c0 92.8 74.5 168.3 166 168.3h376c91.5 0 166-75.5 166-168.3V410.1c0-92.8-74.5-168.3-166-168.3z m-542 168.3v291.6h-20.8c-48.1 0-87.3-39.7-87.3-88.5V232c0-48.8 39.2-88.6 87.3-88.6h376c48.2 0 87.3 39.7 87.3 88.6v9.8H417.4c-91.5 0-166 75.5-166 168.3z m629.3 381.2c0 48.8-39.2 88.5-87.3 88.5h-376c-48.2 0-87.3-39.7-87.3-88.5V410.1c0-48.8 39.2-88.6 87.3-88.6h376c48.2 0 87.3 39.7 87.3 88.6v381.2z m-118-230.5h-118V441.2c0-21.9-17.7-39.9-39.3-39.9-21.6 0-39.3 17.9-39.3 39.9v119.6h-118c-21.6 0-39.3 18-39.3 39.9s17.7 39.9 39.3 39.9h118v119.6c0 21.9 17.7 39.9 39.3 39.9 21.6 0 39.3-17.9 39.3-39.9V640.5h118c21.6 0 39.3-17.9 39.3-39.9 0.1-21.9-17.6-39.8-39.3-39.8z" />
                                    </svg>
                                </span>

                                <!-- If action.icon is not 'icon-copy', render the edit SVG -->
                                <span v-else
                                    class="cursor-pointer rounded-md p-2 transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                                    title="Modifier le logiciel">
                                    <svg class="cursor-pointer rounded-md p-2 transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1 feather feather-edit"
                                        fill="none" height="35" width="35" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Tooltip for edit icon -->
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </span>
                            </a>
                            <!-- Delete Button Trigger -->
                            <x-shop::modal>
                                <!-- Toggle Button -->
                                @if (auth()->guard('admin')->user()->role_id == 1 || auth()->guard('admin')->user()->role_id == 3)
                                    <x-slot:toggle>
                                        <a href="#" class="flex">
                                            <span
                                                class="cursor-pointer rounded-md p-2 transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                                                title="Delete">
                                                <svg class="cursor-pointer rounded-md p-2 transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1 feather feather-trash-2"
                                                    fill="none" height="35" width="35" stroke="currentColor"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Trash icon -->
                                                    <path d="M3 6h18" />
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    <path d="M10 11v6" />
                                                    <path d="M14 11v6" />
                                                </svg>
                                            </span>
                                        </a>
                                    </x-slot:toggle>
                                @endif

                                <!-- Modal Header -->
                                <x-slot:header>
                                    <h3
                                        class="flex items-center justify-between gap-2.5 border-b px-4 py-3 text-lg font-bold text-gray-800 dark:border-gray-800 dark:text-white">
                                        Confirmer la suppression
                                    </h3>
                                </x-slot:header>

                                <!-- Modal Content -->
                                <x-slot:content>
                                    <p class="px-4 py-3 text-left text-gray-600 dark:text-gray-300">
                                        Êtes-vous sûr de vouloir supprimer ?
                                    </p>

                                    <!-- Delete Form -->
                                    <form
                                        :action="'{{ route('admin.catalog.product.delete', ':id') }}'.replace(':id', record
                                            .product_id)"
                                        method="POST" class="mt-6">
                                        @csrf
                                        @method('DELETE')
                                        <div class="flex justify-end gap-2.5 px-4 py-2.5">
                                            <!-- Cancel Button -->
                                            <button type="button"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all"
                                                @click="isOpen = false">
                                                Annuler
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="submit" class="primary-button">
                                                Supprimer
                                            </button>
                                        </div>
                                    </form>
                                </x-slot:content>
                            </x-shop::modal>



                            @if (auth()->guard('admin')->user()->role_id == 1)
                                <a :href="'{{ route('admin.catalog.products.validateInvalidateProductToggle', ':id') }}'.replace(
                                    ':id', record.product_id)"
                                    class="w-full flex items-center">
                                    <span v-if="record.is_valid_by_admin"
                                        class="primary-button bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md w-full text-center whitespace-nowrap">
                                        @{{ "@lang('admin::app.global.activare_desativate')" }}
                                    </span>
                                    <span v-else
                                        class="primary-button bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md w-full text-center whitespace-nowrap">
                                        @{{ "@lang('admin::app.global.activare_desativate')" }}
                                    </span>
                                </a>
                            @endif
                            <a v-if="record.url_key"
                                :href="'{{ route('admin.catalog.products.visualize', ':id') }}?app=1'.replace(
                                    ':id', record.url_key)"
                                target="_blank" class="w-full flex items-center">
                                <span
                                    class="primary-button bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md w-full text-center whitespace-nowrap">
                                    @lang('admin::app.catalog.products.edit.preview')
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
            </template>
        </template>
    </x-admin::datagrid>

    {!! view_render_event('bagisto.admin.catalog.products.list.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-create-product-form-template"
        >
            <div>
                <!-- Product Create Button -->
                @if (bouncer()->hasPermission('catalog.products.create'))
                    <button
                        type="button"
                        class="primary-button"
                        @click="$refs.productCreateModal.toggle()"
                    >
                        @lang('admin::app.catalog.products.index.create-btn')
                    </button>
                @endif

                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @submit="handleSubmit($event, create)">
                        <!-- Customer Create Modal -->
                        <x-admin::modal ref="productCreateModal">
                            <!-- Modal Header -->
                            <x-slot:header>
                                <p
                                    class="text-lg font-bold text-gray-800 dark:text-white"
                                    v-if="! attributes.length"
                                >
                                    @lang('admin::app.catalog.products.index.create.title')
                                </p>

                                <p
                                    class="text-lg font-bold text-gray-800 dark:text-white"
                                    v-else
                                >
                                    @lang('admin::app.catalog.products.index.create.configurable-attributes')
                                </p>
                            </x-slot>

                            <!-- Modal Content -->
                            <x-slot:content>
                                <div v-show="! attributes.length">
                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}

                                    <!-- Product Type -->
                                  {{--   <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.catalog.products.index.create.type')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="type"
                                            rules="required"
                                            :label="trans('admin::app.catalog.products.index.create.type')"
                                        >
                                            @foreach(config('product_types') as $key => $type)
                                                <option value="{{ $key }}">
                                                    @lang($type['name'])
                                                </option>
                                            @endforeach
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error control-name="type" />
                                    </x-admin::form.control-group> --}}

                                    <!-- Attribute Family Id -->
                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.catalog.products.index.create.family')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="attribute_family_id"
                                            rules="required"
                                            :label="trans('admin::app.catalog.products.index.create.family')"
                                        >
                                            @foreach($families as $family)
                                                <option value="{{ $family->id }}">
                                                    {{ $family->name }}
                                                </option>
                                            @endforeach
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error control-name="attribute_family_id" />
                                    </x-admin::form.control-group>

                                    <!-- SKU -->
                                    {{-- <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.catalog.products.index.create.sku')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="sku"
                                            ::rules="{ required: true, regex: /^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/ }"
                                            :label="trans('admin::app.catalog.products.index.create.sku')"
                                        />

                                        <x-admin::form.control-group.error control-name="sku" />
                                    </x-admin::form.control-group> --}}

                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}
                                </div>

                                <div v-show="attributes.length">
                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.attributes.controls.before') !!}

                                    <div
                                        class="mb-2.5"
                                        v-for="attribute in attributes"
                                    >
                                        <label
                                            class="block text-xs font-medium leading-6 text-gray-800 dark:text-white"
                                            v-text="attribute.name"
                                        >
                                        </label>

                                        <div class="flex min-h-[38px] flex-wrap gap-1 rounded-md border p-1.5 dark:border-gray-800">
                                            <p
                                                class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                v-for="option in attribute.options"
                                            >
                                                @{{ option.name }}

                                                <span
                                                    class="icon-cross cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                    @click="removeOption(option)"
                                                >
                                                </span>
                                            </p>
                                        </div>
                                    </div>

                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.attributes.controls.before') !!}
                                </div>
                            </x-slot>

                            <!-- Modal Footer -->
                            <x-slot:footer>
                                <!-- Modal Submission -->
                                <div class="flex items-center gap-x-2.5">
                                    <button
                                        type="button"
                                        class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                                        v-if="attributes.length"
                                        @click="attributes = []"
                                    >
                                        @lang('admin::app.catalog.products.index.create.back-btn')
                                    </button>


                                    <button
                                        type="submit"
                                        class="primary-button"
                                    >
                                        @lang('admin::app.catalog.products.index.create.save-btn')
                                    </button>
                                </div>
                            </x-slot>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-create-product-form', {
                template: '#v-create-product-form-template',

                data() {
                    return {
                        attributes: [],

                        superAttributes: {}
                    };
                },

                methods: {
                    create(params, {
                        resetForm,
                        resetField,
                        setErrors
                    }) {
                        this.attributes.forEach(attribute => {
                            params.super_attributes ||= {};

                            params.super_attributes[attribute.code] = this.superAttributes[attribute.code];
                        });

                        this.$axios.post("{{ route('admin.catalog.products.store') }}", params)
                            .then((response) => {
                                if (response.data.data.redirect_url) {
                                    window.location.href = response.data.data.redirect_url;
                                } else {
                                    this.attributes = response.data.data.attributes;

                                    this.setSuperAttributes();
                                }
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },

                    removeOption(option) {
                        this.attributes.forEach(attribute => {
                            attribute.options = attribute.options.filter(item => item.id != option.id);
                        });

                        this.attributes = this.attributes.filter(attribute => attribute.options.length > 0);

                        this.setSuperAttributes();
                    },

                    setSuperAttributes() {
                        this.superAttributes = {};

                        this.attributes.forEach(attribute => {
                            this.superAttributes[attribute.code] = [];

                            attribute.options.forEach(option => {
                                this.superAttributes[attribute.code].push(option.id);
                            });
                        });
                    }
                }
            })
        </script>
    @endPushOnce
</x-admin::layouts>
