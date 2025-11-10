@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')
@inject('attributeOptionRepository', 'Webkul\Attribute\Repositories\AttributeOptionRepository')

@php
    $avgRatings = $reviewHelper->getAverageRating($product);

    $percentageRatings = $reviewHelper->getPercentageRating($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);
    //dd($customAttributeValues);
    $attributeData = collect($customAttributeValues)->filter(fn($item) => !empty($item['value']));
@endphp

<!-- SEO Meta Content -->
@push('meta')
    <meta name="description"
        content="{{ trim($product->meta_description) != '' ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}" />

    <meta name="keywords" content="{{ $product->meta_keywords }}" />

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) !!}
        </script>
    @endif

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta property="og:url" content="{{ route('shop.product_or_category.index', $product->url_key) }}" />
    <style>
        .main_container_div {
            background: #FBFBFB 0% 0% no-repeat padding-box !important;
            padding-left: 12%;
            padding-right: 12%;
        }

        @media (max-width: 768px) {
            .main_container_div {
                background: #FBFBFB 0% 0% no-repeat padding-box !important;
                padding-left: 5%;
                padding-right: 5%;
            }
        }

        .main_header_container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .main_header {
            font: normal normal bold 33px/19px Urbanist;
            letter-spacing: 0px;
            color: #000000;
            line-height: 1.6;
            opacity: 1;
        }

        .main_header_pro {
            font: normal normal bold 33px/19px MarkPro;
            letter-spacing: 0px;
            color: #000000;
            line-height: 1.6;
            opacity: 1;
        }

        @media (max-width: 768px) {
            .main_header_pro {
                font-size: 24px;
                /* Adjust font size for mobile */
            }
        }

        .img_container {
            border: 1px solid #F5F5F5;
            border-radius: 27px !important;
            width: 20% !important;
        }

        .img_container_img {
            width: 80%;
            height: auto;
            object-fit: cover;
            margin: 10px !important;
        }

        .img_container_h1 {
            color: #000000;
            font: normal normal bold 17px/23px MarkPro;
        }

        .w_full_responsive {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        @media only screen and (max-width: 768px) {
            .main_header {
                font: normal normal bold 17px/19px Urbanist;
                letter-spacing: 0px;
                color: #000000;
                line-height: 1.6;
                opacity: 1;
            }

            .w_full_responsive {
                width: 100%;
            }

            .img_container {
                border: 1px solid #F5F5F5;
                border-radius: 27px !important;
                width: 80% !important;
            }

        }

        .presentation_caracteristiques_text {
            font: normal normal bold 23px/19px Urbanist;
        }

        .description_text {
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 23px;
            font-family: MarkPro;

            letter-spacing: 0px;
            color: #000000;
            opacity: 1;
        }

        .customAttributeValue {
            font-style: normal;
            font-variant: normal;
            font-weight: 500;
            line-height: 18px;
            font-family: Urbanist;
            letter-spacing: 0px;
            color: #000000;
            opacity: 1;
        }

        .space_height {
            margin-top: 1%;
            margin-left: 1%;
            margin-bottom: 1%;
            font-style: normal;
            font-variant: normal;
            font-weight: bold;
            line-height: 18px;
            font-family: Urbanist;
        }

        .btns_actions {
            color: #444A5A !important;
            fill: #444A5A !important;
            font: normal normal 500 1rem/19px Urbanist !important;
        }

        .btns_actions:hover {
            color: #3B5495 !important;
            fill: #3B5495 !important;
            font: normal normal 500 1rem/19px Urbanist !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js" defer></script>

@endPush

<!-- Page Layout -->
<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($product->meta_title) != '' ? $product->meta_title : $product->name }}
    </x-slot>

    <div class="pdf" id="div_print">
        <div class="print-header print:block hidden">
            <img src="{{ asset('LOGO_GSN.png') }}" alt="Left Logo" class="logo-left hidden">
            <img src="{{ asset('Conseil_national-blanc-transformed.png') }}" alt="Right Logo" class="logo-right hidden">
        </div>

        <div class="w-full   main_container_div">
            <br>
            <br>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between w-full">
                <h1 class="main_header_pro">
                    Fiche logiciel : {{ $product->name }}
                </h1>
                <div class="btns_actions my-8 mx-4 cursor-pointer flex items-center gap-x-2.5 whitespace-nowrap border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:px-3 max-md:text-xs max-sm:py-1.5"
                    onclick="generatePDF();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.284" height="21.284" viewBox="0 0 21.284 21.284">
                        <path id="print"
                            d="M4.619,2H15.182l1.447,1.411V6.651h2V3.406A2,2,0,0,0,18.039,2L16.628.584A1.993,1.993,0,0,0,15.219,0H4.619A1.988,1.988,0,0,0,2.661,1.995v3.42h0V6.651h2ZM18.291,7.982H2.993A3,3,0,0,0,0,10.975v4.656a1,1,0,0,0,1,1H3.326v3.326a1.33,1.33,0,0,0,1.33,1.33H16.628a1.33,1.33,0,0,0,1.33-1.33V16.628h2.328a1,1,0,0,0,1-1V10.975A3,3,0,0,0,18.291,7.982ZM15.963,19.289H5.321V15.3H15.963Zm3.326-4.656h-1.33a1.33,1.33,0,0,0-1.33-1.33H4.656a1.33,1.33,0,0,0-1.33,1.33H2V10.975a1,1,0,0,1,1-1h15.3a1,1,0,0,1,1,1Z"
                            transform="translate(0 0)" fill="#3b5495" />
                    </svg>
                    Imprimer
                </div>

            </div>





            <div class="w-4/5 md:w-1/5 items-center justify-center flex bg-white rounded-lg flex-col  gap-2.5 [&amp;>*]:flex-[0] overflow-auto scroll-smooth scrollbar-hide img_container"
                style="">
                <img class="img_container_img" style=""
                    @if ($product->societe && $product->societe->logo) src="/{{ $product->societe->logo }}"
                 @else
                  src="{{ url('themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp') }}" @endif
                    alt="{{ $product->name }}">
                <br>
            </div>
            <p class="presentation_caracteristiques_text mt-10 categorie_print hidden">
                Catégorie : {{ $product->categories[0]->name }}
            </p>
            <p class="presentation_caracteristiques_text mt-10 présentation">
                Présentation
            </p>
            <br>
            <p class="w-full  mx-auto description_text py-2">
                {!! $product->description !!}
            </p>
            <br class="hidden-break">
            <p class="presentation_caracteristiques_text categorie">
                Catégorie
            </p>
            <br class="hidden-break">
            <p class="w-full  mx-auto description_text categorie">
                {{ $product->categories[0]->name }}
            </p>


        </div>
        @php

            $productPageService = app('Webkul\Shop\Services\ProductPageService');
        @endphp
        <div class="w-full   main_container_div">
            {{-- main_container_div_pure --}}
            <div class="w-full mt-10 " style="background: #FBFBFB 0% 0% no-repeat padding-box !important;">

                <div class="w_full_responsive">
                    @foreach ($product->attribute_family->attribute_groups->reject(function ($attributeGroup) {
            return $attributeGroup->code === 'inventories' || $attributeGroup->code === 'price' || $attributeGroup->code === 'general' || $attributeGroup->code === 'meta_description' || $attributeGroup->code === 'description' || $attributeGroup->code === 'settings';
        })->groupBy('column') as $column => $groups)
                        @foreach ($groups as $group)
                            @php
                                $customAttributes = $product->getEditableAttributes($group)->reject(function ($gr) {
                                    return $gr->code === 'sku' || $gr->code === 'url_key';
                                });
                                $categoryBreaks = [
                                    'Data' => 'Support / Formation',
                                    'Social-RH' => 'Interopérabilité',
                                    'Comptabilité - Précomptabilité' => 'Interopérabilité',
                                    'Gestion interne & Commerciale' => 'Interopérabilité',
                                    'Durabilité' => 'Accessibilité',
                                    'Juridique-Fiscal' => 'Accessibilité',
                                    'PDP' => 'Accessibilité',
                                    'Gestion patrimoine' => 'Support / Formation',
                                    'Gestion trésorerie-financement' => 'Interopérabilité',
                                    'Signature électronique, Télétransmission, archivage' => 'Sécurité des données',
                                ];
                                $categoryName = $product->categories[0]->name ?? null;

                                $breakClass =
                                    $group->name === ($categoryBreaks[$categoryName] ?? null) ? 'break-padge' : '';

                                $gestionCommercial =
                                    $categoryName === 'Gestion interne & Commerciale' ? 'Fonctionnalités-div' : null;

                            @endphp
                            @if (count($customAttributes))
                                <div class="{{ $breakClass }}">
                                    <p style="color: #000000;font: normal normal bold 1.2rem Urbanist;margin-bottom:20px;margin-top:20px;"
                                        class="group_name">
                                        {{ $group->name }}
                                    </p>
                                    @foreach ($customAttributes as $index => $attribute)
                                        @if ($productPageService->CheckIfProductHasThisAttributeAndTypeIsNotText($attribute, $product))
                                            <div class="w-full flex @if ($group->name === 'Fonctionnalités') {{ $gestionCommercial }} @endif"
                                                style="background: #F1F1F1  !important; border-bottom: 2px solid #E4E4E7">
                                                <div class="w-2/6 md:w-2/6 px-0 md:px-4 py-2"
                                                    style="opacity: 1;border-right: 2px solid #FFFFFF;">
                                                    <p class="py-2 px-4 customAttributeValue break-words ">
                                                        {{ $attribute->admin_name }}
                                                    </p>
                                                </div>
                                                @if ($attribute->type == 'checkbox')
                                                    <div class="flex items-center justify-center  w-1/6 md:w-1/6 px-4 py-2 "
                                                        style="  border-right: 2px solid #FFFFFF;">

                                                        @php
                                                            $selectedOption = $attributeOptionRepository->find(
                                                                $product[$attribute->code],
                                                            );
                                                        @endphp
                                                        @if (!is_null($selectedOption) && $selectedOption->admin_name == 'non')
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20">
                                                                <path id="circle-xmark"
                                                                    d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                    fill="#ff2b44" />
                                                            </svg>
                                                        @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'oui')
                                                            <div class="flex w-full items-center justify-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 20 20">
                                                                    <path id="circle-check"
                                                                        d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                        fill="#27986f" />
                                                                </svg>

                                                            </div>
                                                        @endif

                                                    </div>
                                                @elseif ($attribute->type == 'select')
                                                    @php
                                                        $selectedOption = $attributeOptionRepository->find(
                                                            $product[$attribute->code],
                                                        );
                                                    @endphp
                                                    <div class="flex items-center justify-center w-1/6 md:w-1/6"
                                                        style="border-right: 2px solid #FFFFFF;">

                                                        <div class="flex items-center justify-center">
                                                            @if (!is_null($selectedOption) && $selectedOption->admin_name == 'non')
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 20 20">
                                                                    <path id="circle-xmark"
                                                                        d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                        fill="#ff2b44" />
                                                                </svg>
                                                            @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'oui')
                                                                <div class="flex w-full items-center justify-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" height="20"
                                                                        viewBox="0 0 20 20">
                                                                        <path id="circle-check"
                                                                            d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                            fill="#27986f" />
                                                                    </svg>

                                                                </div>
                                                            @else
                                                                @if (!is_null($selectedOption))
                                                                    <p class="flex items-center w-2/5 md:w-3/5 urbaniste_9"
                                                                        style="padding-left: 1%;">
                                                                        {{ $selectedOption->admin_name }}
                                                                    </p>
                                                                @else
                                                                    <p class="flex items-center w-2/5 md:w-3/5"
                                                                        style="padding-left: 3%;">

                                                                    </p>
                                                                @endif
                                                            @endif

                                                        </div>

                                                    </div>
                                                @elseif ($attribute->type == 'boolean')
                                                    <div class="flex items-center justify-center w-1/6 md:w-1/6"
                                                        style="border-right: 2px solid #FFFFFF;">

                                                        <div class="flex items-center justify-center">
                                                            @if ($product[$attribute->code] == '0')
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 20 20">
                                                                    <path id="circle-xmark"
                                                                        d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                        fill="#ff2b44" />
                                                                </svg>
                                                            @elseif ($product[$attribute->code] == '1')
                                                                <div class="flex w-full items-center justify-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" height="20"
                                                                        viewBox="0 0 20 20">
                                                                        <path id="circle-check"
                                                                            d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                            fill="#27986f" />
                                                                    </svg>

                                                                </div>
                                                            @endif

                                                        </div>

                                                    </div>
                                                @else
                                                    <p class="flex items-center justify-center w-1/6 md:w-1/6 py-2  break-words"
                                                        style="border-right: 2px solid #FFFFFF;">
                                                        @if ($attribute->validation == 'numeric')
                                                            {{ $product[$attribute->code] ?? '-' }}
                                                        @endif

                                                    </p>
                                                @endif
                                                @if ($attribute->type == 'checkbox')
                                                    <div class="flex items-center  w-3/6 md:w-3/6 px-4 py-2 "
                                                        style=" padding-left: 3%;">

                                                        @php
                                                            $selectedOption = $attributeOptionRepository->find(
                                                                $product[$attribute->code],
                                                            );
                                                        @endphp
                                                        @if (!is_null($selectedOption) && $selectedOption->admin_name == 'non')
                                                            <div class="flex w-full items-center">
                                                                <span class="w-full break-words"></span>
                                                            </div>
                                                        @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'oui')
                                                            <div class="flex w-full items-center">

                                                                @if (isset($customAttributes[$index + 1]))
                                                                    @if ($productPageService->fetchNextValue($customAttributes, $index))
                                                                        <span class=" w-full break-words urbaniste_9">
                                                                            {{ $product[$customAttributes[$index + 1]->code] }}
                                                                        </span>
                                                                    @else
                                                                        <span class="w-full break-words"></span>
                                                                    @endif
                                                                @else
                                                                    <span class="w-full break-words"></span>
                                                                @endif
                                                            </div>
                                                        @else
                                                            @if (!is_null($selectedOption))
                                                                <p class="flex items-center w-2/5 md:w-3/5 urbaniste_9"
                                                                    style="padding-left: 1%;">
                                                                    {{ $selectedOption->admin_name }}
                                                                </p>
                                                            @else
                                                                <p class="flex items-center w-2/5 md:w-3/5"
                                                                    style="padding-left: 3%;">

                                                                </p>
                                                            @endif
                                                        @endif

                                                    </div>
                                                @elseif ($attribute->type == 'select')
                                                    @php
                                                        $selectedOption = $attributeOptionRepository->find(
                                                            $product[$attribute->code],
                                                        );
                                                    @endphp
                                                    <div class="flex items-center w-3/6 md:w-3/6   px-4 py-2"
                                                        style="padding-left: 3%;">

                                                        <div class="flex items-center w-full">
                                                            @if (!is_null($selectedOption) && $selectedOption->admin_name == 'non')
                                                                <div class="flex w-full items-center">
                                                                    <span class="w-full break-words"></span>
                                                                </div>
                                                            @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'oui')
                                                                <div class="flex w-full items-center">

                                                                    @if (isset($customAttributes[$index + 1]))
                                                                        @if ($productPageService->fetchNextValue($customAttributes, $index))
                                                                            <span class="  w-full break-words">
                                                                                {{ $product[$customAttributes[$index + 1]->code] }}

                                                                            </span>
                                                                        @else
                                                                            <span class="w-full break-words"></span>
                                                                        @endif
                                                                    @else
                                                                        <span class="w-full break-words"></span>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                        </div>

                                                    </div>
                                                @elseif ($attribute->type == 'boolean')
                                                    <div class="flex items-center  w-3/6 md:w-3/6  px-4 py-2"
                                                        style="padding-left: 3%;">

                                                        <div class="flex items-center w-full">
                                                            @if ($product[$attribute->code] == '0')
                                                                <div class="flex w-full items-center">
                                                                    <span class="w-full break-words"></span>
                                                                </div>
                                                            @elseif ($product[$attribute->code] == '1')
                                                                <div class="flex w-full items-center">

                                                                    @if (isset($customAttributes[$index + 1]))
                                                                        @if ($productPageService->fetchNextValue($customAttributes, $index))
                                                                            <span
                                                                                class="urbaniste_9  w-full break-words">
                                                                                {{ $product[$customAttributes[$index + 1]->code] }}
                                                                            </span>
                                                                        @else
                                                                            <span class="w-full break-words"></span>
                                                                        @endif
                                                                    @else
                                                                        {{-- Optional: Display a fallback message or leave it empty --}}
                                                                        <span class="w-full break-words"></span>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                        </div>

                                                    </div>
                                                @else
                                                    <p class="flex items-center w-3/6 md:w-3/6 py-2 pr-8 urbaniste_9 {{ $productPageService->classifyString($product[$attribute->code] ?? '-') ? 'break-words' : 'break-all' }}"
                                                        style="padding-left: 3%;">
                                                        @if (is_null($attribute->validation))
                                                            {{ $product[$attribute->code] ?? '-' }}
                                                        @else
                                                            @if (isset($customAttributes[$index + 1]))
                                                                @if ($productPageService->fetchNextValue($customAttributes, $index))
                                                                    <span class="urbaniste_9  w-full break-words">
                                                                        {{ $product[$customAttributes[$index + 1]->code] }}
                                                                    </span>
                                                                @else
                                                                    <span class="w-full break-words"></span>
                                                                @endif
                                                            @else
                                                                {{-- Optional: Display a fallback message or leave it empty --}}
                                                                <span class="w-full break-words"></span>
                                                            @endif
                                                        @endif
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>



    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

    <script>
        function generatePDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();
            const decodeHTML = (text) => {
                const textarea = document.createElement('textarea');
                textarea.innerHTML = text;
                textarea.style.display = 'none';
                return textarea.value;
            };
            const logoUrl = document.querySelector('.img_container_img')?.src || '';
            const logoObject = document.querySelector('.img_container_img');

            // Initial space settings
            let yPos = 20;
            const headerHeight = 15;
            doc.setFillColor(26, 33, 64);
            doc.rect(0, 0, doc.internal.pageSize.width, headerHeight, 'F');

            yPos = headerHeight + 2;
            const logo_left = document.querySelector('.logo-left');
            const logo_right = document.querySelector('.logo-right');
            if (logo_left) {
                doc.addImage(logo_left.src, 'JPEG', 0, 1, 30, ((headerHeight) * 80) / 100);
            }
            if (logo_right) {
                const pageWidth = doc.internal.pageSize.width;
                let right_logo_x_pos = pageWidth - 40 - 0;
                doc.addImage(logo_right.src, 'PNG', right_logo_x_pos, 2, 40, ((headerHeight) * 60) / 100);
            }

            // Define the checkmark and X images
            function createSVGImage(svg, color) {
                const size = 30;
                const canvas = document.createElement('canvas');
                canvas.width = size;
                canvas.height = size;
                const ctx = canvas.getContext('2d');
                ctx.imageSmoothingEnabled = true;
                ctx.imageSmoothingQuality = 'high';
                ctx.beginPath();
                ctx.arc(size / 2, size / 2, size / 2 - 1, 0, Math.PI * 2);
                ctx.strokeStyle = color;
                ctx.lineWidth = 1;
                ctx.stroke();
                ctx.beginPath();
                if (svg === 'check') {
                    ctx.moveTo(size / 4, size / 2);
                    ctx.lineTo(size / 2 - 2, size / 2 + size / 4);
                    ctx.lineTo(size - size / 4, size / 4);
                } else {
                    ctx.moveTo(size / 4, size / 4);
                    ctx.lineTo(size - size / 4, size - size / 4);
                    ctx.moveTo(size - size / 4, size / 4);
                    ctx.lineTo(size / 4, size - size / 4);
                }
                ctx.strokeStyle = color;
                ctx.lineWidth = 2;
                ctx.stroke();
                return canvas.toDataURL();
            }

            // Initialize the check and X images
            const checkImage = createSVGImage('check', '#27986f');
            const xImage = createSVGImage('x', '#ff2b44');
            yPos += 4;

            // Add a gray background for the logo area
            const logoX = 10;
            const logoWidth = 40;
            const logoHeight = 40;
            doc.setFillColor(251, 251, 251);
            doc.rect(logoX, yPos, logoWidth, logoHeight, 'F'); // Draw gray background behind the logo

            // Add the logo
            if (logoUrl) {
                let maxWidth = 40;
                let maxHeight = 40;
                let imgWidth = logoObject.width;
                let imgHeight = logoObject.height;

                let scaleFactor = Math.min(maxWidth / imgWidth, maxHeight / imgHeight);
                let newWidth = imgWidth * scaleFactor;
                let newHeight = imgHeight * scaleFactor;

                doc.addImage(logoUrl, 'JPEG', logoX, yPos, newWidth, newHeight);
            }

            // Add title and category next to the logo
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(16);
            const title = decodeHTML('{{ $product->name }}');
            const lines = doc.splitTextToSize(title, 140); // Reduced width to fit beside logo
            doc.text(lines, 60, yPos + 10); // Positioned to the right of logo

            // Add category below title with word breaking
            doc.setFontSize(11);
            const cat = decodeHTML('Catégorie : {{ $product->categories[0]->name }}');
            const catLines = doc.splitTextToSize(cat, 140); // Same width for breaking words
            const spaceBetween = 4; // Set the space between title and category
            doc.text(catLines, 60, yPos + 10 + lines.length * 5 + spaceBetween); // Positioned below title with space

            // Update yPos to the maximum of logo height and text height
            yPos += Math.max(logoHeight, 30) + 10;

            // Add presentation
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(11);
            const présentation = decodeHTML(document.querySelector('.présentation')?.innerText || '');
            doc.text(présentation, 10, yPos);
            yPos += 5;

            // Add description
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(10);
            const description = decodeHTML(document.querySelector('.description_text').innerText);
            const splitDescription = doc.splitTextToSize(description, 190);
            doc.text(splitDescription, 10, yPos);
            yPos += doc.getTextDimensions(splitDescription).h + 4;

            // Initialize sections object and collect section data
            const sections = {};
            let currentSection = '';

            // Collect section data
            document.querySelectorAll('.group_name').forEach(section => {
                currentSection = section.innerText.trim();
                sections[currentSection] = [];
            });

            currentSection = '';
            document.querySelectorAll('.group_name, .w-full.flex').forEach(element => {
                if (element.classList.contains('group_name')) {
                    currentSection = element.innerText.trim();
                } else {
                    const label = element.querySelector('.customAttributeValue')?.innerText;
                    const hasCheck = element.querySelector('svg path[id="circle-check"]') !== null;
                    const hasX = element.querySelector('svg path[id="circle-xmark"]') !== null;
                    const details = element.querySelector('.urbaniste_9')?.innerText || '';
                    if (label && currentSection) {
                        sections[currentSection].push([
                            label,
                            {
                                type: hasCheck ? 'check' : (hasX ? 'x' : ''),
                                image: hasCheck ? checkImage : (hasX ? xImage : '')
                            },
                            details
                        ]);
                    }
                }
            });

            // Set up page parameters
            let pageCount = 1;
            let pageHeight = doc.internal.pageSize.height;
            let marginTop = 0;
            let marginBottom = 0;
            let availableHeight = pageHeight - marginTop - marginBottom;
            let data_height = 10;

            let length_kkey = 0;
            Object.entries(sections).forEach(([sectionName, sectionData]) => {
                sectionData.map((row) => {
                    length_kkey = length_kkey + 1;
                });
            });

            if (length_kkey > 48) {
                data_height = 10;
            }

            // Generate tables for each section
            Object.entries(sections).forEach(([sectionName, sectionData]) => {
                if (sectionData.length === 0) return;

                if (yPos + 30 > availableHeight) {
                    doc.addPage();
                    yPos = marginTop + 5
                }

                doc.autoTable({
                    startY: yPos,
                    head: [
                        [sectionName, '', '']
                    ],
                    body: sectionData.filter(row => row[0] && row[0].trim() !== '').map(row => [row[0], '',
                        row[2]
                    ]),
                    theme: 'plain',
                    styles: {
                        fontSize: 9,
                        cellPadding: 1.3,
                        minCellHeight: 6
                    },
                    headStyles: {
                        fillColor: [240, 240, 240],
                        textColor: [0, 0, 0],
                        fontSize: data_height,
                        fontStyle: 'bold',
                        minCellHeight: 8
                    },
                    columnStyles: {
                        0: {
                            cellWidth: 65
                        },
                        1: {
                            cellWidth: 10
                        },
                        2: {
                            cellWidth: 115
                        }
                    },
                    margin: {
                        left: 10,
                        right: 10
                    },
                    pageBreak: 'auto',
                    didDrawCell: function(data) {
                        const {
                            cell,
                            row,
                            column
                        } = data;

                        doc.setDrawColor(200);
                        doc.setLineWidth(0.1);
                        doc.rect(cell.x, cell.y, cell.width, cell.height);
                        // Check if rowData exists and if the column index is 1
                        if (column.index === 1 && data.cell.section === 'body') {
                            const rowData = sectionData[row.index];
                            if (rowData && rowData[1] && rowData[1].image) {
                                console.log(rowData);
                                const x = cell.x + (cell.width - 3) / 2;
                                const y = cell.y + (cell.height - 3) / 2;
                                doc.addImage(rowData[1].image, 'PNG', x, y, 3, 3);
                            }
                        }
                    }
                });

                yPos = doc.lastAutoTable.finalY + 4;
            });

            // Open PDF in new tab
            const pdfUrl = doc.output('bloburl');
            window.open(pdfUrl, '_blank');
        }
    </script>






    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-product-template"
        >
            <x-shop::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form
                    ref="formData"
                    @submit="handleSubmit($event, addToCart)"
                >
                    <input
                        type="hidden"
                        name="product_id"
                        value="{{ $product->id }}"
                    >

                    <input
                        type="hidden"
                        name="is_buy_now"
                        v-model="is_buy_now"
                    >

                    <div class="container px-[60px] max-1180:px-0">
                        <div class="mt-12 flex gap-9 max-1180:flex-wrap max-lg:mt-0 max-sm:gap-y-4">
                            <!-- Gallery Blade Inclusion -->
                            @include('shop::products.view.gallery')

                            <!-- Details -->
                            <div class="relative max-w-[590px] max-1180:w-full max-1180:max-w-full max-1180:px-5 max-sm:px-4">
                                {!! view_render_event('bagisto.shop.products.name.before', ['product' => $product]) !!}

                                <div class="flex justify-between gap-4">
                                    <h1 class="text-3xl font-medium max-sm:text-xl">
                                        {{ $product->name }}
                                    </h1>

                                    @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                                        <div
                                            class="flex max-h-[46px] min-h-[46px] min-w-[46px] cursor-pointer items-center justify-center rounded-full border bg-white text-2xl transition-all hover:opacity-[0.8] max-sm:max-h-7 max-sm:min-h-7 max-sm:min-w-7 max-sm:text-base"
                                            role="button"
                                            aria-label="@lang('shop::app.products.view.add-to-wishlist')"
                                            tabindex="0"
                                            :class="isWishlist ? 'icon-heart-fill text-red-600' : 'icon-heart'"
                                            @click="addToWishlist"
                                        >
                                        </div>
                                    @endif
                                </div>

                                {!! view_render_event('bagisto.shop.products.name.after', ['product' => $product]) !!}

                                <!-- Rating -->
                                {!! view_render_event('bagisto.shop.products.rating.before', ['product' => $product]) !!}

                                @if ($totalRatings = $reviewHelper->getTotalFeedback($product))
                                    <!-- Scroll To Reviews Section and Activate Reviews Tab -->
                                    <div
                                        class="mt-1 w-max cursor-pointer max-sm:mt-1.5"
                                        role="button"
                                        tabindex="0"
                                        @click="scrollToReview"
                                    >
                                        <x-shop::products.ratings
                                            class="transition-all hover:border-gray-400 max-sm:px-3 max-sm:py-1"
                                            :average="$avgRatings"
                                            :total="$totalRatings"
                                            ::rating="true"
                                        />
                                    </div>
                                @endif

                                {!! view_render_event('bagisto.shop.products.rating.after', ['product' => $product]) !!}

                                <!-- Pricing -->
                                {!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

                                <p class="mt-[22px] flex items-center gap-2.5 text-2xl !font-medium max-sm:mt-2 max-sm:gap-x-2.5 max-sm:gap-y-0 max-sm:text-lg">
                                    {!! $product->getTypeInstance()->getPriceHtml() !!}
                                </p>

                                @if (\Webkul\Tax\Facades\Tax::isInclusiveTaxProductPrices())
                                    <span class="text-sm font-normal text-zinc-500 max-sm:text-xs">
                                        (@lang('shop::app.products.view.tax-inclusive'))
                                    </span>
                                @endif

                                @if (count($product->getTypeInstance()->getCustomerGroupPricingOffers()))
                                    <div class="mt-2.5 grid gap-1.5">
                                        @foreach ($product->getTypeInstance()->getCustomerGroupPricingOffers() as $offer)
                                            <p class="text-zinc-500 [&>*]:text-black">
                                                {!! $offer !!}
                                            </p>
                                        @endforeach
                                    </div>
                                @endif

                                {!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}

                                {!! view_render_event('bagisto.shop.products.short_description.before', ['product' => $product]) !!}

                                <p class="mt-6 text-lg text-zinc-500 max-sm:mt-1.5 max-sm:text-sm">
                                    {!! $product->short_description !!}
                                </p>

                                {!! view_render_event('bagisto.shop.products.short_description.after', ['product' => $product]) !!}

                                @include('shop::products.view.types.configurable')

                                @include('shop::products.view.types.grouped')

                                @include('shop::products.view.types.bundle')

                                @include('shop::products.view.types.downloadable')


                                <!-- Product Actions and Qunatity Box -->
                                <div class="mt-8 flex max-w-[470px] gap-4 max-sm:mt-4">

                                    {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}

                                    @if ($product->getTypeInstance()->showQuantityBox())
                                        <x-shop::quantity-changer
                                            name="quantity"
                                            value="1"
                                            class="gap-x-4 rounded-xl px-7 py-4 max-md:py-3 max-sm:gap-x-5 max-sm:rounded-lg max-sm:px-4 max-sm:py-1.5"
                                        />
                                    @endif

                                    {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}

                                    @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                                        <!-- Add To Cart Button -->
                                        {!! view_render_event('bagisto.shop.products.view.add_to_cart.before', ['product' => $product]) !!}

                                        <x-shop::button
                                            type="submit"
                                            class="secondary-button w-full max-w-full max-md:py-3 max-sm:rounded-lg max-sm:py-1.5"
                                            button-type="secondary-button"
                                            :loading="false"
                                            :title="trans('shop::app.products.view.add-to-cart')"
                                            :disabled="! $product->isSaleable(1)"
                                            ::loading="isStoring.addToCart"
                                        />

                                        {!! view_render_event('bagisto.shop.products.view.add_to_cart.after', ['product' => $product]) !!}
                                    @endif
                                </div>

                                <!-- Buy Now Button -->
                                @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                                    {!! view_render_event('bagisto.shop.products.view.buy_now.before', ['product' => $product]) !!}

                                    @if (core()->getConfigData('catalog.products.storefront.buy_now_button_display'))
                                        <x-shop::button
                                            type="submit"
                                            class="primary-button mt-5 w-full max-w-[470px] max-md:py-3 max-sm:mt-3 max-sm:rounded-lg max-sm:py-1.5"
                                            button-type="primary-button"
                                            :title="trans('shop::app.products.view.buy-now')"
                                            :disabled="! $product->isSaleable(1)"
                                            ::loading="isStoring.buyNow"
                                            @click="is_buy_now=1;"
                                        />
                                    @endif

                                    {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}
                                @endif

                                {!! view_render_event('bagisto.shop.products.view.additional_actions.before', ['product' => $product]) !!}

                                <!-- Share Buttons -->
                                <div class="mt-10 flex gap-9 max-md:mt-4 max-md:flex-wrap max-sm:justify-center max-sm:gap-3">
                                    {!! view_render_event('bagisto.shop.products.view.compare.before', ['product' => $product]) !!}

                                    <div
                                        class="flex cursor-pointer items-center justify-center gap-2.5 max-sm:gap-1.5 max-sm:text-base"
                                        role="button"
                                        tabindex="0"
                                        @click="is_buy_now=0; addToCompare({{ $product->id }})"
                                    >
                                        @if (core()->getConfigData('catalog.products.settings.compare_option'))
                                            <span
                                                class="icon-compare text-2xl"
                                                role="presentation"
                                            ></span>

                                            @lang('shop::app.products.view.compare')
                                        @endif
                                    </div>

                                    {!! view_render_event('bagisto.shop.products.view.compare.after', ['product' => $product]) !!}
                                </div>

                                {!! view_render_event('bagisto.shop.products.view.additional_actions.after', ['product' => $product]) !!}
                            </div>
                        </div>
                    </div>
                </form>
            </x-shop::form>
        </script>

        <script type="module">
            app.component('v-product', {
                template: '#v-product-template',

                data() {
                    return {
                        isWishlist: Boolean(
                            "{{ (bool) auth()->guard()->user()?->wishlist_items->where('channel_id', core()->getCurrentChannel()->id)->where('product_id', $product->id)->count() }}"
                        ),

                        isCustomer: '{{ auth()->guard('customer')->check() }}',

                        is_buy_now: 0,

                        isStoring: {
                            addToCart: false,

                            buyNow: false,
                        },
                    }
                },

                methods: {
                    addToCart(params) {
                        const operation = this.is_buy_now ? 'buyNow' : 'addToCart';

                        this.isStoring[operation] = true;

                        let formData = new FormData(this.$refs.formData);

                        this.ensureQuantity(formData);

                        this.$axios.post('{{ route('shop.api.checkout.cart.store') }}', formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(response => {
                                if (response.data.message) {
                                    this.$emitter.emit('update-mini-cart', response.data.data);

                                    this.$emitter.emit('add-flash', {
                                        type: 'success',
                                        message: response.data.message
                                    });

                                    if (response.data.redirect) {
                                        window.location.href = response.data.redirect;
                                    }
                                } else {
                                    this.$emitter.emit('add-flash', {
                                        type: 'warning',
                                        message: response.data.data.message
                                    });
                                }

                                this.isStoring[operation] = false;
                            })
                            .catch(error => {
                                this.isStoring[operation] = false;

                                this.$emitter.emit('add-flash', {
                                    type: 'warning',
                                    message: error.response.data.message
                                });
                            });
                    },

                    addToWishlist() {
                        if (this.isCustomer) {
                            this.$axios.post('{{ route('shop.api.customers.account.wishlist.store') }}', {
                                    product_id: "{{ $product->id }}"
                                })
                                .then(response => {
                                    this.isWishlist = !this.isWishlist;

                                    this.$emitter.emit('add-flash', {
                                        type: 'success',
                                        message: response.data.data.message
                                    });
                                })
                                .catch(error => {});
                        } else {
                            window.location.href = "{{ route('shop.customer.session.index') }}";
                        }
                    },

                    addToCompare(productId) {
                        /**
                         * This will handle for customers.
                         */
                        if (this.isCustomer) {
                            this.$axios.post('{{ route('shop.api.compare.store') }}', {
                                    'product_id': productId
                                })
                                .then(response => {
                                    this.$emitter.emit('add-flash', {
                                        type: 'success',
                                        message: response.data.data.message
                                    });
                                })
                                .catch(error => {
                                    if ([400, 422].includes(error.response.status)) {
                                        this.$emitter.emit('add-flash', {
                                            type: 'warning',
                                            message: error.response.data.data.message
                                        });

                                        return;
                                    }

                                    this.$emitter.emit('add-flash', {
                                        type: 'error',
                                        message: error.response.data.message
                                    });
                                });

                            return;
                        }

                        /**
                         * This will handle for guests.
                         */
                        let existingItems = this.getStorageValue(this.getCompareItemsStorageKey()) ?? [];

                        if (existingItems.length) {
                            if (!existingItems.includes(productId)) {
                                existingItems.push(productId);

                                this.setStorageValue(this.getCompareItemsStorageKey(), existingItems);

                                this.$emitter.emit('add-flash', {
                                    type: 'success',
                                    message: "@lang('shop::app.products.view.add-to-compare')"
                                });
                            } else {
                                this.$emitter.emit('add-flash', {
                                    type: 'warning',
                                    message: "@lang('shop::app.products.view.already-in-compare')"
                                });
                            }
                        } else {
                            this.setStorageValue(this.getCompareItemsStorageKey(), [productId]);

                            this.$emitter.emit('add-flash', {
                                type: 'success',
                                message: "@lang('shop::app.products.view.add-to-compare')"
                            });
                        }
                    },

                    getCompareItemsStorageKey() {
                        return 'compare_items';
                    },

                    setStorageValue(key, value) {
                        localStorage.setItem(key, JSON.stringify(value));
                    },

                    getStorageValue(key) {
                        let value = localStorage.getItem(key);

                        if (value) {
                            value = JSON.parse(value);
                        }

                        return value;
                    },

                    scrollToReview() {
                        let accordianElement = document.querySelector('#review-accordian-button');

                        if (accordianElement) {
                            accordianElement.click();

                            accordianElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }

                        let tabElement = document.querySelector('#review-tab-button');

                        if (tabElement) {
                            tabElement.click();

                            tabElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    },

                    ensureQuantity(formData) {
                        if (!formData.has('quantity')) {
                            formData.append('quantity', 1);
                        }
                    },
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
