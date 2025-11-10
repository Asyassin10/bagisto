<!-- SEO Meta Content -->
@push('meta')
    <meta name="description"
        content="{{ trim($category->meta_description) != '' ? $category->meta_description : \Illuminate\Support\Str::limit(strip_tags($category->description), 120, '') }}" />

    <meta name="keywords" content="{{ $category->meta_keywords }}" />

    @if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category) !!}
        </script>
    @endif
@endPush
<style>
    #main {
        overflow-x: hidden;
    }

    @media (max-width: 1280px) and (max-height: 700px) {
        .custom-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        }
    }

    @media (max-width: 1098px) and (max-height: 363px) {
        .custom-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
        }
    }
</style>

<x-shop::layouts>
    <!-- Page Title -->
    {{--  <x-slot:title>

    </x-slot> --}}
    <h1>
        {{ trim($category->meta_title) != '' ? $category->meta_title : $category->name }}
    </h1>

    @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
        @if ($category->description)
            <div class="container mt-[34px] px-[60px] max-lg:px-8 max-md:mt-4 max-md:px-4 max-md:text-sm max-sm:text-xs"
                style="margin-top: -1.5%;
            ">
                {{--  {!! $category->description !!} --}}
                <div class="mt-8 flex items-center justify-between max-md:mt-5  ">

                    <h1 class="text-2xl font-medium max-sm:text-base " style="margin-top: 2%;"> Résultats pour :
                        {!! $category->description !!}
                    </h1>
                </div>
            </div>
        @endif
    @endif


    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        <!-- Category Vue Component -->
        <v-category>
            <!-- Category Shimmer Effect -->
            <x-shop::shimmer.categories.view />
        </v-category>
    @endif

    @pushOnce('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categoryContainer = document.getElementById('dynamic-category-container');
                const categoryContainerMobile = document.getElementById('dynamic-category-container_mobile');
                const queryInput = document.getElementById('query_input');
                const queryInputMobile = document.getElementById('query_input_mobile');

                if (categoryContainer) {
                    categoryContainer.innerHTML = `
                    <span style="color: #707070; font-size: 12px; font-weight: normal;">
                        Rechercher dans la thématique : <span id="name_of_cat">{{ $category->name }}</span>
                    </span>
                `;
                    categoryContainer.style.border = '1px solid rgb(112, 112, 112)';

                    categoryContainer.style.borderRadius = '24px';
                }

                if (categoryContainerMobile) {
                    categoryContainerMobile.innerHTML = `
                    <span style="color: #707070; font-size: 9px; font-weight: normal;">
                        Rechercher dans la thématique : <span id="name_of_cat">{{ $category->name }}</span>
                    </span>
                `;
                }


                if (queryInput) {
                    queryInput.addEventListener('input', hideContent);
                    queryInput.addEventListener('keydown', hideContent);
                    queryInput.addEventListener('focus', hideContent);
                }

                if (queryInputMobile) {
                    queryInputMobile.addEventListener('input', hideContent);
                    queryInputMobile.addEventListener('keydown', hideContent);
                    queryInputMobile.addEventListener('focus', hideContent);
                }
                if (queryInput) {
                    queryInput.readOnly = true;
                }

                if (queryInputMobile) {
                    queryInputMobile.readOnly = true;
                }
            });

            function hideContent() {
                const categoryContainer = document.getElementById('dynamic-category-container');
                const categoryContainerMobile = document.getElementById('dynamic-category-container_mobile');
                const queryInput = document.getElementById('query_input');
                const queryInputMobile = document.getElementById('query_input_mobile');

                if (categoryContainer) {
                    categoryContainer.innerHTML = '';
                    categoryContainer.style.border = 'none';
                    categoryContainer.style.color = '';
                    categoryContainer.style.background = '';
                }

                if (categoryContainerMobile) {
                    categoryContainerMobile.innerHTML = '';
                    categoryContainerMobile.style.border = 'none';
                    categoryContainerMobile.style.color = '';
                    categoryContainerMobile.style.background = '';
                }

                if (queryInput) {
                    queryInput.readOnly = false;
                }

                if (queryInputMobile) {
                    queryInputMobile.readOnly = false;
                }
            }
        </script>


        <script
            type="text/x-template"
            id="v-category-template"
            >

            <div class="container px-[60px] max-lg:px-8 max-sm:px-4">
                <div class="flex items-start gap-10 max-lg:gap-5 md:mt-10">
                    <!-- Product Listing Filters -->
                    @include('shop::categories.filters')

                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <!-- Product List Card Container -->
                        <div
                            class="mt-8 grid grid-cols-1 gap-6"
                            v-if="filters.toolbar.mode === 'list'"
                        >
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.list count="12" />
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <x-shop::products.card
                                        ::mode="'list'"
                                        v-for="product in products"
                                    />
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                                        <img
                                            class="max-sm:h-[100px] max-sm:w-[100px]"
                                            src="{{ asset('ShopImages/empty-folder.png') }}" style="max-width: 40%;"
                                            alt="Empty result"
                                        />

                                        <p
                                            class="text-xl max-sm:text-sm"
                                            role="heading"
                                        >
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Product Grid Card Container -->
                        <div v-else>
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <div class="mt-8 grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-md:gap-x-4 max-sm:mt-5 max-sm:justify-items-center max-sm:gap-y-5">
                                    <x-shop::shimmer.products.cards.grid count="12" />
                                </div>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="custom-grid mt-8 grid grid-cols-3 gap-12 max-1060:grid-cols-2 max-md:mt-5 max-md:justify-items-center max-md:gap-x-4 max-md:gap-y-5 div-grid-card">
                                        <x-shop::products.card
                                            ::mode="'grid'"
                                            v-for="product in products"
                                            :navigation-link="route('shop.search.index')"
                                        />
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                                        <img
                                            class="max-sm:h-[100px] max-sm:w-[100px]"
                                            src="{{ asset('ShopImages/empty-folder.png') }}" style="max-width: 40%;"
                                            alt="Empty result"
                                        />

                                        <p
                                            class="text-xl max-sm:text-sm"
                                            role="heading"
                                        >
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Load More Button -->
                          <button
                            class=" mx-auto hover:underline flex mt-[60px] items-center w-max rounded-2xl px-11 py-3 text-center text-base max-md:rounded-lg max-md:text-sm max-sm:mt-7 max-sm:px-7 max-sm:py-2"
                            @click="loadMoreProducts"
                            v-if="links.next"

                        >
                        <span class="mx-3 px-3 font-medium" style="font-size: 17px !important;font-family:MarkPro !important;font-weight:500 !important;">
                             @lang('shop::app.categories.view.load-more')
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14.456" height="8.942" viewBox="0 0 14.456 8.942">
                                <path id="suivant" d="M0,0,4.936,5.321,10.215,0" transform="translate(2.12 2.121)" fill="none" stroke="#444a5a" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-category', {
                template: '#v-category-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

                        isDrawerActive: {
                            toolbar: false,

                            filter: false,
                        },

                        filters: {
                            toolbar: {},

                            filter: {},
                        },

                        products: [],

                        links: {},

                        loader: false,
                    }
                },

                computed: {
                    queryParams() {
                        let queryParams = Object.assign({}, this.filters.filter, this.filters.toolbar);

                        return this.removeJsonEmptyValues(queryParams);
                    },

                    queryString() {
                        return this.jsonToQueryString(this.queryParams);
                    },
                },

                watch: {
                    queryParams() {
                        this.getProducts();
                    },

                    queryString() {
                        window.history.pushState({}, '', '?' + this.queryString);
                    },
                },

                methods: {
                    setFilters(type, filters) {
                        this.filters[type] = filters;
                    },

                    clearFilters(type, filters) {
                        this.filters[type] = {};
                    },

                    getProducts() {
                        this.isDrawerActive = {
                            toolbar: false,

                            filter: false,
                        };

                        document.body.style.overflow = 'scroll';

                        this.$axios.get("{{ route('shop.api.products.index', ['category_id' => $category->id]) }}", {
                                params: this.queryParams
                            })
                            .then(response => {
                                this.isLoading = false;

                                this.products = response.data.data;

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                    },


                    loadMoreProducts() {
                        if (!this.links.next) {
                            return;
                        }

                        this.loader = true;

                        this.$axios.get(this.links.next)
                            .then(response => {
                                this.loader = false;

                                this.products = [...this.products, ...response.data.data];

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(function(key) {
                            if ((!params[key] && params[key] !== undefined)) {
                                delete params[key];
                            }

                            if (Array.isArray(params[key])) {
                                params[key] = params[key].join(',');
                            }
                        });

                        return params;
                    },

                    jsonToQueryString(params) {
                        let parameters = new URLSearchParams();

                        for (const key in params) {
                            parameters.append(key, params[key]);
                        }

                        return parameters.toString();
                    }
                },
            });
        </script>
    @endPushOnce
    @include('shop::compare.modal')
</x-shop::layouts>
