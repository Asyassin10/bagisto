@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')
@inject('attributeOptionRepository', 'Webkul\Attribute\Repositories\AttributeOptionRepository')

@php
    $avgRatings = $reviewHelper->getAverageRating($product);
    $channel = core()->getCurrentChannel();

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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">


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

        .main_container_div:after {
            content: "";
            display: table;
            clear: both;
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
            border-radius: 27px !important;
            width: 100% !important;
            position: relative;
            margin-bottom: 20px;
            /* Reduced from 30px to 20px for more consistent spacing */
        }

        .img_container_img {
            /*  height: 50px !important; */
            /* Fixed height (adjust as needed) */
            object-fit: cover;

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
            margin-bottom: 15px;
            display: block;
        }


        .main_container_div>div:has(.img_container) {
            display: flex;
            flex-direction: column;

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
            margin-top: 10px;
            margin-bottom: 10px;

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

        .w-full-100 {
            width: 100% !important;
        }

        .left-text {
            margin-left: 18% !important;
            padding-bottom: 5px;
            /* Add some bottom padding for spacing */
        }

        .urbanist-site {
            color: rgb(0, 0, 0);
            font: bold 1.2rem Urbanist;
            position: relative;
            /* Changed from -10% to fixed value */
        }


        .group_name_site {
            display: block !important;
        }

        @media (min-width: 768px) {
            .group_name_site {
                display: none;
            }
        }

        @media (max-width: 767.98px) {
            .group_name_site {
                display: none;
            }
        }

        /* Optional: For extra small devices (e.g., phones in portrait mode) */
        @media (max-width: 575.98px) {
            .group_name_site {
                display: none;
            }
        }

        @media (max-width: 767.98px) {
            .group_name_site {
                display: none;
            }
        }

        .pdp_style {
            color: #000000;
            font: normal normal bold 1.2rem Urbanist;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .p-18 {
            padding: 18px;
            color: grey !important;

        }

        .span-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .border-b {
            border-bottom-width: 0px !important;
        }

        #svgContainer {
            display: none;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/3.0.1/jspdf.umd.min.js"
        integrity="sha512-ad3j5/L4h648YM/KObaUfjCsZRBP9sAOmpjaT2BDx6u9aBrKFp7SbeHykruy83rxfmG42+5QqeL/ngcojglbJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvg/3.0.10/umd.js" referrerpolicy="no-referrer"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js" defer></script>



    </script>
@endPush
<style>
    .max-w-\[595px\] {
        max-width: 70% !important;
    }

    .text-mdal {
        display: block;
        font-family: Inter;
        font-weight: 400;
        font-size: 12px;
        line-height: 100%;
        letter-spacing: 0px;
        padding: 1%;
    }

    .close-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #FFFFFF;
        /* Red color */
        color: black;
        border: 1px solid #B7B7B7;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0px 4px 4px 0px #10184014;
        text-align: center;
    }

    .presentation-section {

        padding-top: 20px;
        /* Space between border and heading */

    }

    .site-link:hover {
        color: rgb(80, 80, 80) !important;
        /* lighter than black */

    }

    .badge-congres-ribbon {
        margin-right: 9%;
        position: absolute;
        top: -125px;
        right: -110px;
        background-color: #10b981;
        color: white;
        font-size: 9px;
        font-weight: 600;
        padding: 6px 40px;
        transform: rotate(0deg);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        white-space: nowrap;
        min-width: 14px;
        text-align: center;
    }
</style>
<div id="svgContainer"></div>

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
                <p id="product_name_locicel" style="display: none;">{{ $product->name }}</p>
                <p id="product_cat_locicel" style="display: none;">{{ $product->categories[0]->name }}</p>
                <div class="btns_actions my-8 mx-4 cursor-pointer flex items-center gap-x-2.5 whitespace-nowrap border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:px-3 max-md:text-xs max-sm:py-1.5"
                    id="app_generate_pdf_export_logiciel"
                    onclick='generatePDF("{{ $product->name }}", "{{ $product->categories[0]->name }}", "{{ $product->societe->site_web ?? '' }}")'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.284" height="21.284" viewBox="0 0 21.284 21.284">
                        <path id="print"
                            d="M4.619,2H15.182l1.447,1.411V6.651h2V3.406A2,2,0,0,0,18.039,2L16.628.584A1.993,1.993,0,0,0,15.219,0H4.619A1.988,1.988,0,0,0,2.661,1.995v3.42h0V6.651h2ZM18.291,7.982H2.993A3,3,0,0,0,0,10.975v4.656a1,1,0,0,0,1,1H3.326v3.326a1.33,1.33,0,0,0,1.33,1.33H16.628a1.33,1.33,0,0,0,1.33-1.33V16.628h2.328a1,1,0,0,0,1-1V10.975A3,3,0,0,0,18.291,7.982ZM15.963,19.289H5.321V15.3H15.963Zm3.326-4.656h-1.33a1.33,1.33,0,0,0-1.33-1.33H4.656a1.33,1.33,0,0,0-1.33,1.33H2V10.975a1,1,0,0,1,1-1h15.3a1,1,0,0,1,1,1Z"
                            transform="translate(0 0)" fill="#3b5495" />
                    </svg>
                    Imprimer
                </div>

            </div>


            <div class="w-full  flex flex-row items-start justify-center rounded-lg  img_container relative ">
                <a href="{{ $product->societe && $product->societe->site_web ? (parse_url($product->societe->site_web, PHP_URL_SCHEME) ? $product->societe->site_web : 'https://' . $product->societe->site_web) : '#' }}"
                    target="_blank" class="img_container_img md:w-1/5">
                    <img class="w-1/2 h-1/2"
                        @if ($product->societe && $product->societe->logo) src="/{{ $product->societe->logo }}"
                    @else
                     src="{{ url('themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp') }}" @endif
                        alt="{{ $product->name }}" class="img_container_img_src" id="img_container_img_src_id">
                </a>

                <div class="urbanist-site md:w-4/5 " style="margin-top: 0%; ">
                    @if ($product->is_congrate_partner && $product->is_congrate_partner == true)
                        <div class="badge-congres-ribbon">
                            Partenaire Congrès {{ date('Y') }}
                        </div>
                    @endif

                    <p class="top-0 right-0 text-right  urbanist-site site-link">
                        <a href="{{ $product->societe->site_web ?? '#' }}" target="_blank" rel="noopener noreferrer"
                            class="site-link">
                            {{ $product->societe->site_web ?? '' }}
                        </a>
                    </p>

                    <p style="margin-top: -2%;" class="text-left p-2 space-y-1  ">
                        {{ $product->societe->nom ?? '' }}</p>
                    <p class="description_text py-2 text-left p-2 space-y-1 ">
                        {{ $product->societe->description ?? '' }}</p>

                </div>
            </div>

            <!-- After the image/societe section -->
            <div class="presentation-section"> <!-- Adjust px as needed -->
                <p class="presentation_caracteristiques_text mt-presntation présentation">
                    Présentation de la solution
                </p>

                <p class="w-full mx-auto description_text py-2">
                    {!! $product->description !!}
                </p>

                @if ($is_congrate_partner[0]->is_congrate_partner == 1)
                    <br>
                    <p class="w-full mx-auto description_text py-2">
                        {{ $channel->home_seo['SlugPartnerCongre'] ?? '' }}
                    </p>
                @endif

                <br class="hidden-break">

                <p class="presentation_caracteristiques_text categorie">
                    Catégorie : {{ $product->categories[0]->name }}
                </p>

                <p class="w-full mx-auto description_text categorie"></p>
            </div>


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

                                $categoryCode = $product->categories[0]->name;
                                if ($categoryCode == 'Signature électronique, Télétransmission, archivage') {
                                    /*  $customAttributes = $product->getEditableAttributes($group)->reject(function ($gr) {
                                                                                    return $gr->code === 'sku' || $gr->code === 'url_key';
                                                                                }); */
                                    $attributeValue = $product['KqU1t7Fusp5zHgvi'] ?? null;

                                    if ($attributeValue) {
                                        $selectedOption = $attributeOptionRepository->find($attributeValue);

                                        if ($selectedOption && $selectedOption->admin_name === 'non') {
                                            // Your logic here
                                            // List of attribute codes to remove
                                            $codesToRemove = [
                                                'JOL1ipxXeZLdZWyr',
                                                'xxdxsw',
                                                '70Xi7sBYn2Bdm7cz',
                                                'AEqvw4LAO7KFqBM9',
                                                'wdWMAJYdlPV5zFFq',
                                            ];

                                            // Remove attributes with specified codes
                                            $customAttributes = $customAttributes->reject(function ($attr) use (
                                                $codesToRemove,
                                            ) {
                                                return in_array($attr->code, $codesToRemove, true);
                                            });
                                        }
                                    }
                                }
                            @endphp
                            @if (count($customAttributes))
                                <div class="{{ $breakClass }}">
                                    <p class="group_name pdp_style">
                                        {{ $group->name }}
                                    </p>


                                    @foreach ($customAttributes as $index => $attribute)
                                        @if ($attribute->code != 'QzLtH7rwnv80zArd')
                                            @if ($productPageService->CheckIfProductHasThisAttributeAndTypeIsNotText($attribute, $product))
                                                @if ($attribute->code == '3BlnHKhXvk4OMhmc')
                                                    <h1 class=" group_name_sub pdp_style p-18">Général</h1>
                                                @endif
                                                @if ($attribute->code == 'cca_c748a')
                                                    <h1 class=" group_name_sub pdp_style p-18">Facturation et
                                                        paiement</h1>
                                                @endif
                                                @if ($attribute->code == '9JKOI0HXGrjKKzDB')
                                                    <h1 class="group_name_sub  pdp_style p-18">Services
                                                        complémentaires</h1>
                                                @endif
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
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" height="20"
                                                                        viewBox="0 0 20 20">
                                                                        <path id="circle-check"
                                                                            d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                            fill="#27986f" />
                                                                    </svg>

                                                                </div>
                                                            @else
                                                                @if (in_array($attribute->admin_name, $libele_in_second_column_include_checkbox))
                                                                    @if (!is_null($selectedOption))
                                                                        <p class="flex items-center w-2/5 md:w-3/5 urbaniste_9 justify-center"
                                                                            style="padding-left: 1%;">
                                                                            {{ $selectedOption->admin_name }}
                                                                        </p>
                                                                    @else
                                                                        <p class="flex items-center w-2/5 md:w-3/5"
                                                                            style="padding-left: 3%;">

                                                                        </p>
                                                                    @endif
                                                                @endif
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
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" height="20"
                                                                        viewBox="0 0 20 20">
                                                                        <path id="circle-xmark"
                                                                            d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                            fill="#ff2b44" />
                                                                    </svg>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'oui')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 20 20">
                                                                            <path id="circle-check"
                                                                                d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                                fill="#27986f" />
                                                                        </svg>

                                                                    </div>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'abonnement')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
                                                                        <p>
                                                                            abonnement
                                                                        </p>
                                                                    </div>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'gratuit')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
                                                                        <p>
                                                                            gratuit
                                                                        </p>
                                                                    </div>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'à l\'usage ')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
                                                                        <p>
                                                                            à l'usage
                                                                        </p>
                                                                    </div>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'Neobanque')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 20 20">
                                                                            <path id="circle-check"
                                                                                d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                                fill="#27986f" />
                                                                        </svg>

                                                                    </div>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'Banque traditionnelle')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 20 20">
                                                                            <path id="circle-check"
                                                                                d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                                fill="#27986f" />
                                                                        </svg>

                                                                    </div>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'Aucun')
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" height="20"
                                                                        viewBox="0 0 20 20">
                                                                        <path id="circle-xmark"
                                                                            d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                            fill="#ff2b44" />
                                                                    </svg>
                                                                @elseif (!is_null($selectedOption) && $selectedOption->admin_name == 'Banque traditionnelle et Néobanque')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 20 20">
                                                                            <path id="circle-check"
                                                                                d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                                fill="#27986f" />
                                                                        </svg>

                                                                    </div>
                                                                @else
                                                                    @if (in_array($attribute->admin_name, $libele_in_second_column_include))
                                                                        @if (!is_null($selectedOption))
                                                                            <p class="flex items-center w-2/5 md:w-3/5  @if ($attribute->admin_name == 'Niveau de signature') numeric_val @else urbaniste_9 @endif"
                                                                                style="padding-left: 1%;">
                                                                                {{ $selectedOption->admin_name }}
                                                                            </p>
                                                                        @else
                                                                            <p class="flex items-center w-2/5 md:w-3/5"
                                                                                style="padding-left: 3%;">

                                                                            </p>
                                                                        @endif
                                                                    @endif
                                                                @endif

                                                            </div>

                                                        </div>
                                                    @elseif ($attribute->type == 'boolean')
                                                        <div class="flex items-center justify-center w-1/6 md:w-1/6"
                                                            style="border-right: 2px solid #FFFFFF;">

                                                            <div class="flex items-center justify-center">
                                                                @if ($product[$attribute->code] == '0')
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="20" height="20"
                                                                        viewBox="0 0 20 20">
                                                                        <path id="circle-xmark"
                                                                            d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z"
                                                                            fill="#ff2b44" />
                                                                    </svg>
                                                                @elseif ($product[$attribute->code] == '1')
                                                                    <div
                                                                        class="flex w-full items-center justify-center">
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
                                                        <p class="flex items-center justify-center w-1/6 md:w-1/6 py-2  break-words @if ($attribute->validation == 'numeric') numeric_val @endif"
                                                            style="border-right: 2px solid #FFFFFF;">
                                                            @if ($attribute->validation == 'numeric' || $attribute->code == 'kaHcHDhZl2NkwyEe')
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
                                                                            <span
                                                                                class=" w-full break-words urbaniste_9">
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
                                                                @if (!in_array($attribute->admin_name, $libele_in_second_column_include_checkbox))
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
                                                            @endif

                                                        </div>
                                                    @elseif ($attribute->type == 'select')
                                                        {{-- @if ($attribute->code != 'I5hCjZbLFL68bVT3') --}}
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
                                                                @elseif (
                                                                    !is_null($selectedOption) &&
                                                                        ($selectedOption->admin_name == 'oui' ||
                                                                            $selectedOption->admin_name == 'abonnement' ||
                                                                            $selectedOption->admin_name == 'gratuit' ||
                                                                            $selectedOption->admin_name == 'à l\'usage'))
                                                                    <div class="flex w-full items-center">
                                                                        @if (isset($customAttributes[$index + 1]))
                                                                            @if ($productPageService->fetchNextValue($customAttributes, $index))
                                                                                <span class="  w-full break-words">
                                                                                    {{ $product[$customAttributes[$index + 1]->code] }}

                                                                                </span>
                                                                            @else
                                                                                <span
                                                                                    class="w-full break-words"></span>
                                                                            @endif
                                                                        @else
                                                                            <span class="w-full break-words"></span>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    @if (!in_array($attribute->admin_name, $libele_in_second_column_include))
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
                                                                @endif

                                                            </div>

                                                        </div>
                                                        {{-- @endif --}}
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
                                                                                <span
                                                                                    class="w-full break-words"></span>
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
                                                        @if ($attribute->code != 'QzLtH7rwnv80zArd')
                                                            <p class="flex items-center w-3/6 md:w-3/6 py-2 pr-8 urbaniste_9 {{ $productPageService->classifyString($product[$attribute->code] ?? '-') ? 'break-words' : 'break-all' }}"
                                                                style="padding-left: 3%;">
                                                                @if (is_null($attribute->validation))
                                                                    @if ($attribute->code == 'kaHcHDhZl2NkwyEe')
                                                                        @if (isset($customAttributes[$index + 1]))
                                                                            @if ($productPageService->fetchNextValue($customAttributes, $index))
                                                                                <span
                                                                                    class="urbaniste_9  w-full break-words">
                                                                                    {{ $product[$customAttributes[$index + 1]->code] }}
                                                                                    @if ($attribute->code == 'im4Js9IU9e9Q4tDn')
                                                                                        <x-shop::modal>
                                                                                            <x-slot:toggle>
                                                                                                <span
                                                                                                    class="span-link">
                                                                                                    <span
                                                                                                        style="  display: flex; align-items: center; gap: 5px;">
                                                                                                        en savoir plus
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="15"
                                                                                                            height="15"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            fill="none"
                                                                                                            stroke="currentColor"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round">
                                                                                                            <path
                                                                                                                d="M14 3h7v7" />
                                                                                                            <path
                                                                                                                d="M10 14 21 3" />
                                                                                                            <path
                                                                                                                d="M21 14v7h-7" />
                                                                                                            <path
                                                                                                                d="M3 10v11h11" />
                                                                                                        </svg>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </x-slot>

                                                                                            <x-slot:header>
                                                                                                <span
                                                                                                    style="font-family: Inter;
                                                                                                                                                                                                font-weight: 600;
                                                                                                                                                                                                font-size: 16px;
                                                                                                                                                                                                line-height: 152%;
                                                                                                                                                                                                letter-spacing: 0%;
                                                                                                                                                                                                vertical-align: middle;
                                                                                                                                                                                                ">Liste
                                                                                                    des 36 cas
                                                                                                    d’usage</span>
                                                                                            </x-slot>

                                                                                            <x-slot:content>
                                                                                                <div
                                                                                                    style="max-height: 60vh;overflow-y: auto; padding: 1rem;">
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°1 :
                                                                                                        Multi-commande
                                                                                                        /
                                                                                                        Multi-livraison</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°2 : Facture
                                                                                                        déjà
                                                                                                        payée
                                                                                                        par l'acheteur
                                                                                                        ou un
                                                                                                        tiers désigné à
                                                                                                        la
                                                                                                        facturation au
                                                                                                        moment de
                                                                                                        l'émission de la
                                                                                                        facture</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°3 : Facture à
                                                                                                        payer
                                                                                                        par un tiers
                                                                                                        désigné
                                                                                                        au
                                                                                                        moment de la
                                                                                                        facturation</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°4 : Facture à
                                                                                                        payer
                                                                                                        par l'acheteur
                                                                                                        et
                                                                                                        prise
                                                                                                        en charge
                                                                                                        partiellement
                                                                                                        par un tiers
                                                                                                        connu à
                                                                                                        la
                                                                                                        facturation
                                                                                                        (subvention,
                                                                                                        assurance
                                                                                                        ...)
                                                                                                    </span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°5 : Frais
                                                                                                        payés
                                                                                                        par
                                                                                                        des
                                                                                                        collaborateurs
                                                                                                        (hors
                                                                                                        carte d'achat ou
                                                                                                        logée),
                                                                                                        avec facture au
                                                                                                        nom
                                                                                                        de
                                                                                                        l'entreprise
                                                                                                        (e-invoicing)
                                                                                                        ou facture
                                                                                                        au nom du
                                                                                                        collaborateur</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°6 : Frais
                                                                                                        payés
                                                                                                        par
                                                                                                        des
                                                                                                        collaborateurs
                                                                                                        (hors
                                                                                                        carte d'achat ou
                                                                                                        logée),
                                                                                                        sans facture
                                                                                                        (simple
                                                                                                        ticket de
                                                                                                        caisse)
                                                                                                        (e-reporting des
                                                                                                        données
                                                                                                        de transaction
                                                                                                        hors
                                                                                                        facture)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°7 : Facture
                                                                                                        suite
                                                                                                        à un
                                                                                                        achat payé avec
                                                                                                        carte
                                                                                                        logée (carte
                                                                                                        d'achat)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°8 : Facture à
                                                                                                        payer à
                                                                                                        un tiers
                                                                                                        déterminé
                                                                                                        au
                                                                                                        moment de la
                                                                                                        facturation
                                                                                                        (affacturage,
                                                                                                        centralisation
                                                                                                        de
                                                                                                        trésorerie)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°9 : Facture à
                                                                                                        payer à
                                                                                                        un tiers connu
                                                                                                        au
                                                                                                        moment
                                                                                                        de la
                                                                                                        facturation,
                                                                                                        qui
                                                                                                        gère aussi la
                                                                                                        commande /
                                                                                                        la réception,
                                                                                                        voire
                                                                                                        la
                                                                                                        facturation
                                                                                                        (Distributeur /
                                                                                                        Dépositaire)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        N°10 : Facture à
                                                                                                        payer à
                                                                                                        un factor
                                                                                                        inconnu à
                                                                                                        la
                                                                                                        création de la
                                                                                                        facture
                                                                                                        (cas de la
                                                                                                        subrogation)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°11 : Facture
                                                                                                        avec
                                                                                                        «
                                                                                                        Adressée à »
                                                                                                        différent
                                                                                                        de
                                                                                                        l'acheteur</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°12 :
                                                                                                        Intermédiaire
                                                                                                        transparent
                                                                                                        gestionnaire
                                                                                                        de facture pour
                                                                                                        son
                                                                                                        commettant
                                                                                                        acheteur</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°13 : Facture à
                                                                                                        payer
                                                                                                        par un tiers
                                                                                                        (cas de
                                                                                                        sous-traitance
                                                                                                        avec
                                                                                                        paiement direct
                                                                                                        ou
                                                                                                        délégation de
                                                                                                        paiement)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°14 : Facture à
                                                                                                        payer
                                                                                                        par un tiers
                                                                                                        (cas de
                                                                                                        co-traitance)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°15 : Facture
                                                                                                        de
                                                                                                        vente
                                                                                                        suite à commande
                                                                                                        (et
                                                                                                        paiement
                                                                                                        éventuel)
                                                                                                        d'un
                                                                                                        tiers pour le
                                                                                                        compte
                                                                                                        de</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°16 : Facture
                                                                                                        de
                                                                                                        débours pour
                                                                                                        remboursement de
                                                                                                        la
                                                                                                        facture de vente
                                                                                                        payée
                                                                                                        par le tiers
                                                                                                        Facture
                                                                                                        émise par un
                                                                                                        tiers,
                                                                                                        intermédiaire de
                                                                                                        paiement</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°17a : Facture
                                                                                                        à
                                                                                                        payer
                                                                                                        à un tiers,
                                                                                                        intermédiaire de
                                                                                                        paiement (par
                                                                                                        exemple
                                                                                                        sur une
                                                                                                        marketplace)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°17b : Facture
                                                                                                        à
                                                                                                        payer
                                                                                                        à un tiers,
                                                                                                        intermédiaire de
                                                                                                        paiement et
                                                                                                        mandat
                                                                                                        de
                                                                                                        facturation</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°18 : Gestion
                                                                                                        des
                                                                                                        notes
                                                                                                        de débit</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°19 : Facture
                                                                                                        émise
                                                                                                        sous mandat de
                                                                                                        tiers
                                                                                                        (mandat de
                                                                                                        facturation
                                                                                                        ou
                                                                                                        auto-facturation)</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°20 et 21 :
                                                                                                        Facture
                                                                                                        d'acompte et
                                                                                                        facture
                                                                                                        définitive après
                                                                                                        acompte</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°22 : Facture
                                                                                                        payée
                                                                                                        avec
                                                                                                        escompte</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°23 : Flux en
                                                                                                        auto-facturation
                                                                                                        entre
                                                                                                        un particulier
                                                                                                        et un
                                                                                                        professionnel</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°24 : Gestion
                                                                                                        des
                                                                                                        arrhes</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°25 : Gestion
                                                                                                        des
                                                                                                        bons
                                                                                                        et des cartes
                                                                                                        cadeaux</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°26 : Factures
                                                                                                        avec
                                                                                                        clause de
                                                                                                        réserve
                                                                                                        contractuelle</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°27 : Gestion
                                                                                                        des
                                                                                                        tickets de
                                                                                                        péage</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°28 : Gestion
                                                                                                        des
                                                                                                        notes
                                                                                                        de
                                                                                                        restaurant</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°29 : Assujetti
                                                                                                        unique
                                                                                                        au sens de
                                                                                                        l'article
                                                                                                        256
                                                                                                        C du CGI</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°30 : TVA déjà
                                                                                                        collectée -
                                                                                                        Opérations
                                                                                                        traitées
                                                                                                        initialement en
                                                                                                        e-reporting B2C,
                                                                                                        faisant
                                                                                                        l'objet d'une
                                                                                                        facture a
                                                                                                        posteriori</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°31 : Les
                                                                                                        factures
                                                                                                        «
                                                                                                        mixtes »
                                                                                                        mentionnant
                                                                                                        une
                                                                                                        opération
                                                                                                        principale
                                                                                                        et
                                                                                                        une opération
                                                                                                        accessoire</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°32 : Les
                                                                                                        paiements
                                                                                                        mensuels</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°33 : Les
                                                                                                        opérations
                                                                                                        soumises au
                                                                                                        régime
                                                                                                        de la
                                                                                                        marge</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°34 :
                                                                                                        Encaissement
                                                                                                        partiel et
                                                                                                        annulation</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°35 :
                                                                                                        Notes</span>
                                                                                                    <span
                                                                                                        class="text-mdal">Cas
                                                                                                        n°36 :
                                                                                                        Opérations
                                                                                                        soumises au
                                                                                                        secret
                                                                                                        professionnel et
                                                                                                        échanges de
                                                                                                        données
                                                                                                        sensibles</span>
                                                                                                </div>
                                                                                            </x-slot:content>

                                                                                            <x-slot:footer>

                                                                                                <div
                                                                                                    style="display: flex; justify-content: flex-end; width: 100%;">

                                                                                                    <span
                                                                                                        class="close-btn cursor-pointer"
                                                                                                        onclick="document.querySelectorAll('.myclose').forEach(el => el.style.display = 'none');
                                                                                                                                                                                                    document.body.style.overflow = 'auto';">Fermer
                                                                                                        la
                                                                                                        fenêtre</span>
                                                                                                </div>
                                                                                            </x-slot:footer>



                                                                                        </x-shop::modal>
                                                                                    @endif

                                                                                </span>
                                                                            @else
                                                                                <span
                                                                                    class="w-full break-words"></span>
                                                                            @endif
                                                                        @else
                                                                            {{-- Optional: Display a fallback message or leave it empty --}}
                                                                            <span class="w-full break-words"></span>
                                                                        @endif
                                                                    @else
                                                                        {!! nl2br(e(value: $product[$attribute->code] ?? '-')) !!}
                                                                    @endif
                                                                @else
                                                                    @if (isset($customAttributes[$index + 1]))
                                                                        @if ($productPageService->fetchNextValue($customAttributes, $index))
                                                                            <span
                                                                                class="urbaniste_9  w-full break-words">
                                                                                {{ $product[$customAttributes[$index + 1]->code] }}
                                                                                @if ($attribute->code == 'im4Js9IU9e9Q4tDn')
                                                                                    <x-shop::modal>
                                                                                        <x-slot:toggle>
                                                                                            <span class="span-link">
                                                                                                <span
                                                                                                    style="  display: flex; align-items: center; gap: 5px;">
                                                                                                    en savoir plus
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        width="15"
                                                                                                        height="15"
                                                                                                        viewBox="0 0 24 24"
                                                                                                        fill="none"
                                                                                                        stroke="currentColor"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round">
                                                                                                        <path
                                                                                                            d="M14 3h7v7" />
                                                                                                        <path
                                                                                                            d="M10 14 21 3" />
                                                                                                        <path
                                                                                                            d="M21 14v7h-7" />
                                                                                                        <path
                                                                                                            d="M3 10v11h11" />
                                                                                                    </svg>
                                                                                                </span>
                                                                                            </span>
                                                                                        </x-slot>

                                                                                        <x-slot:header>
                                                                                            <span
                                                                                                style="font-family: Inter;
                                                                                                                                                                                            font-weight: 600;
                                                                                                                                                                                            font-size: 16px;
                                                                                                                                                                                            line-height: 152%;
                                                                                                                                                                                            letter-spacing: 0%;
                                                                                                                                                                                            vertical-align: middle;
                                                                                                                                                                                            ">Liste
                                                                                                des 36 cas
                                                                                                d’usage</span>
                                                                                        </x-slot>

                                                                                        <x-slot:content>
                                                                                            <div
                                                                                                style="max-height: 60vh;overflow-y: auto; padding: 1rem;">
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°1 : Multi-commande
                                                                                                    /
                                                                                                    Multi-livraison</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°2 : Facture déjà
                                                                                                    payée
                                                                                                    par l'acheteur ou un
                                                                                                    tiers désigné à la
                                                                                                    facturation au
                                                                                                    moment de
                                                                                                    l'émission de la
                                                                                                    facture</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°3 : Facture à
                                                                                                    payer
                                                                                                    par un tiers désigné
                                                                                                    au
                                                                                                    moment de la
                                                                                                    facturation</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°4 : Facture à
                                                                                                    payer
                                                                                                    par l'acheteur et
                                                                                                    prise
                                                                                                    en charge
                                                                                                    partiellement
                                                                                                    par un tiers connu à
                                                                                                    la
                                                                                                    facturation
                                                                                                    (subvention,
                                                                                                    assurance
                                                                                                    ...)
                                                                                                </span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°5 : Frais payés
                                                                                                    par
                                                                                                    des collaborateurs
                                                                                                    (hors
                                                                                                    carte d'achat ou
                                                                                                    logée),
                                                                                                    avec facture au nom
                                                                                                    de
                                                                                                    l'entreprise
                                                                                                    (e-invoicing)
                                                                                                    ou facture
                                                                                                    au nom du
                                                                                                    collaborateur</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°6 : Frais payés
                                                                                                    par
                                                                                                    des collaborateurs
                                                                                                    (hors
                                                                                                    carte d'achat ou
                                                                                                    logée),
                                                                                                    sans facture (simple
                                                                                                    ticket de caisse)
                                                                                                    (e-reporting des
                                                                                                    données
                                                                                                    de transaction hors
                                                                                                    facture)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°7 : Facture suite
                                                                                                    à un
                                                                                                    achat payé avec
                                                                                                    carte
                                                                                                    logée (carte
                                                                                                    d'achat)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°8 : Facture à
                                                                                                    payer à
                                                                                                    un tiers déterminé
                                                                                                    au
                                                                                                    moment de la
                                                                                                    facturation
                                                                                                    (affacturage,
                                                                                                    centralisation de
                                                                                                    trésorerie)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°9 : Facture à
                                                                                                    payer à
                                                                                                    un tiers connu au
                                                                                                    moment
                                                                                                    de la facturation,
                                                                                                    qui
                                                                                                    gère aussi la
                                                                                                    commande /
                                                                                                    la réception, voire
                                                                                                    la
                                                                                                    facturation
                                                                                                    (Distributeur /
                                                                                                    Dépositaire)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    N°10 : Facture à
                                                                                                    payer à
                                                                                                    un factor inconnu à
                                                                                                    la
                                                                                                    création de la
                                                                                                    facture
                                                                                                    (cas de la
                                                                                                    subrogation)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°11 : Facture avec
                                                                                                    «
                                                                                                    Adressée à »
                                                                                                    différent
                                                                                                    de l'acheteur</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°12 : Intermédiaire
                                                                                                    transparent
                                                                                                    gestionnaire
                                                                                                    de facture pour son
                                                                                                    commettant
                                                                                                    acheteur</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°13 : Facture à
                                                                                                    payer
                                                                                                    par un tiers (cas de
                                                                                                    sous-traitance avec
                                                                                                    paiement direct ou
                                                                                                    délégation de
                                                                                                    paiement)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°14 : Facture à
                                                                                                    payer
                                                                                                    par un tiers (cas de
                                                                                                    co-traitance)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°15 : Facture de
                                                                                                    vente
                                                                                                    suite à commande (et
                                                                                                    paiement éventuel)
                                                                                                    d'un
                                                                                                    tiers pour le compte
                                                                                                    de</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°16 : Facture de
                                                                                                    débours pour
                                                                                                    remboursement de la
                                                                                                    facture de vente
                                                                                                    payée
                                                                                                    par le tiers Facture
                                                                                                    émise par un tiers,
                                                                                                    intermédiaire de
                                                                                                    paiement</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°17a : Facture à
                                                                                                    payer
                                                                                                    à un tiers,
                                                                                                    intermédiaire de
                                                                                                    paiement (par
                                                                                                    exemple
                                                                                                    sur une
                                                                                                    marketplace)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°17b : Facture à
                                                                                                    payer
                                                                                                    à un tiers,
                                                                                                    intermédiaire de
                                                                                                    paiement et mandat
                                                                                                    de
                                                                                                    facturation</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°18 : Gestion des
                                                                                                    notes
                                                                                                    de débit</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°19 : Facture émise
                                                                                                    sous mandat de tiers
                                                                                                    (mandat de
                                                                                                    facturation
                                                                                                    ou
                                                                                                    auto-facturation)</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°20 et 21 : Facture
                                                                                                    d'acompte et facture
                                                                                                    définitive après
                                                                                                    acompte</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°22 : Facture payée
                                                                                                    avec escompte</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°23 : Flux en
                                                                                                    auto-facturation
                                                                                                    entre
                                                                                                    un particulier et un
                                                                                                    professionnel</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°24 : Gestion des
                                                                                                    arrhes</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°25 : Gestion des
                                                                                                    bons
                                                                                                    et des cartes
                                                                                                    cadeaux</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°26 : Factures avec
                                                                                                    clause de réserve
                                                                                                    contractuelle</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°27 : Gestion des
                                                                                                    tickets de
                                                                                                    péage</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°28 : Gestion des
                                                                                                    notes
                                                                                                    de restaurant</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°29 : Assujetti
                                                                                                    unique
                                                                                                    au sens de l'article
                                                                                                    256
                                                                                                    C du CGI</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°30 : TVA déjà
                                                                                                    collectée -
                                                                                                    Opérations
                                                                                                    traitées
                                                                                                    initialement en
                                                                                                    e-reporting B2C,
                                                                                                    faisant
                                                                                                    l'objet d'une
                                                                                                    facture a
                                                                                                    posteriori</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°31 : Les factures
                                                                                                    «
                                                                                                    mixtes » mentionnant
                                                                                                    une
                                                                                                    opération principale
                                                                                                    et
                                                                                                    une opération
                                                                                                    accessoire</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°32 : Les paiements
                                                                                                    mensuels</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°33 : Les
                                                                                                    opérations
                                                                                                    soumises au régime
                                                                                                    de la
                                                                                                    marge</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°34 : Encaissement
                                                                                                    partiel et
                                                                                                    annulation</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°35 : Notes</span>
                                                                                                <span
                                                                                                    class="text-mdal">Cas
                                                                                                    n°36 : Opérations
                                                                                                    soumises au secret
                                                                                                    professionnel et
                                                                                                    échanges de données
                                                                                                    sensibles</span>
                                                                                            </div>
                                                                                        </x-slot:content>

                                                                                        <x-slot:footer>

                                                                                            <div
                                                                                                style="display: flex; justify-content: flex-end; width: 100%;">

                                                                                                <span
                                                                                                    class="close-btn cursor-pointer"
                                                                                                    onclick="document.querySelectorAll('.myclose').forEach(el => el.style.display = 'none');
                                                                                                                                                                                                  document.body.style.overflow = 'auto';">Fermer
                                                                                                    la fenêtre</span>
                                                                                            </div>
                                                                                        </x-slot:footer>



                                                                                    </x-shop::modal>
                                                                                @endif

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
                                                    @endif
                                                </div>
                                            @endif
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
    {{-- <script defer src="{{ asset('appjs/svgplugin.js') }}"></script> --}}
    <script defer src="{{ asset('appjs/generatePdf.js') }}"></script>







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
