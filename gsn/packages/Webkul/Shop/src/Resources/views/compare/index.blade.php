<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.compare.title')" />
    <meta name="api-base-url" content="{{ env('APP_URL') }}/api">
    <script src="{{ asset('appjs/comparison-modal.js') }}"></script>

    <meta name="keywords" content="@lang('shop::app.compare.title')" />
@endPush
@push('styles')
    <style>
        .compare {
            max-width: 900px !important;
        }

        .left_side_content {
            width: 25% !important;
        }

        .right_side_content {
            width: 66% !important;
        }

        .container_card_images {
            margin-left: 35% !important;
        }

        .btn-voici {
            background: #FDD320;
            color: #333;
            padding: 10px 15px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 27px;
            border: 1px solid #FDD320;
            box-shadow: 0px 1px 3px #00000029;
            transition: background-color 0.3s ease;
            font: normal normal 600 16px/19px Urbanist;
            cursor: pointer;
            text-align: center !important;
        }

        .btn-voici:hover {
            background-color: #FBC400;
            /* Optional: Change color on hover */
        }

        .btn-compare-delete {
            background: #E4E4E7 !important;
            color: #444a5a !important;
            padding: 10px 15px !important;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 27px;
            border: 1px solid #e4e4e7;
            box-shadow: 0px 1px 3px #00000029;
            transition: background-color 0.3s ease;
            font: normal normal 600 16px/19px Urbanist;
            cursor: pointer;
            text-align: center !important;
        }

        .btn-compare-delete:hover {
            background: #C2C2D5 !important;
            color: #444a5a !important;
            border: 1px solid #e4e4e7;
            padding: 10px 15px !important;
            /* Optional: Change color on hover */
        }

        .header_cycle {
            font: normal normal bold 1.25rem/18px Urbanist;
        }

        .header_product_title {
            font: normal normal 500 16px/19px MarkPro !important;
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

        .svg-hover:hover path {
            fill: #3B5495;
            /* Change this color to your desired hover color */
        }

        @media print {
            @page {
                size: tabloid;
                /* Tabloid size is 11x17 inches */
                margin: 1in;
                /* Adjust margin as needed */
            }

            .btns_actions {
                display: none !important;
            }

            .btn_remove {
                display: none !important;
            }

            .voir_fiche {
                display: none !important;
            }

            .delete_btn {
                display: none !important;
            }

            .print-header {
                display: flex !important;
                background-color: #1A2140 !important;
                padding: 20px !important;
                justify-content: center !important;
                align-items: center !important;
            }

            .print-header img {
                max-width: 200px !important;
                max-height: 100px !important;
                object-fit: contain !important;
                display: block !important;
            }
        }
    </style>
@endpush
<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.compare.title')
    </x-slot>


    <!-- Compare Component -->
    <div class="pdf" id="div_print">
        <div class="print-header hidden print:block"
            style="background-color: #1A2140; padding: 20px; display: flex; justify-content: flex-start; align-items: center;">
            <img src="{{ asset('Conseil_national-blanc-transformed.webp') }}" alt="Logo"
                style="max-width: 150px; max-height: 100px; object-fit: contain; margin-right: auto;display:none;">
        </div>

        <div class="container px-[60px] mx-auto  max-lg:px-8 max-md:mt-7 max-md:px-0">
            <br>
            <v-compare>
                <!-- Shimmer Effect -->
                <x-shop::shimmer.compare :attributeCount="4" />
            </v-compare>
        </div>
    </div>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-compare-template"
        >
            <div>
                {!! view_render_event('bagisto.shop.customers.account.compare.before') !!}

                <div v-if="! isLoading">
                    <div class="flex items-center justify-between max-md:px-4">

                        {!! view_render_event('bagisto.shop.customers.account.compare.title.before') !!}

                        <h1 class=" font-medium" style="font-size:2.063rem;font-weight : bold;font-family:urbanist;">
                            @lang('shop::app.compare.title')
                        </h1>

                        {!! view_render_event('bagisto.shop.customers.account.compare.title.after') !!}

                        {!! view_render_event('bagisto.shop.customers.account.compare.remove_all.before') !!}
                        <div class="flex-none md:flex  ">
                            <div
                                class=" btn_remove my-4  hover:text-[#3B5495] text-[#444A5A]  cursor-pointer flex items-center gap-x-1.5 whitespace-nowrap border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:px-3 max-md:text-xs max-sm:py-1.5"
                                v-if="items.length"
                                @click="removeAll"
                                >
                                <span class="icon-bin   " style="font-size:1.8rem !important;font-family; Urbanist !important;"></span>

                                <span class="hover:underline mx-1 ">
                                    @lang('shop::app.compare.delete-all')

                                </span>



                            </div>
                                <div
                                    class=" btn_remove my-4  hover:text-[#3B5495] text-[#444A5A]  cursor-pointer flex items-center gap-x-1.5 whitespace-nowrap border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:px-3 max-md:text-xs max-sm:py-1.5"
                                    v-if="items.length"

                                    >
                                <span class="mx-1 ">


                                </span>

                            </div>

                            <!-- <div
                                class=" btns_actions svg-hover   hover:underline  cursor-pointer mx-0 md:mx-4 flex items-center gap-x-1.5 whitespace-nowrap border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:px-3 max-md:text-xs max-sm:py-1.5"
                                v-if="items.length"
                                @click="printDiv">
                                <div class="mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.284" height="21.284" viewBox="0 0 21.284 21.284">
                                        <path id="print" d="M4.619,2H15.182l1.447,1.411V6.651h2V3.406A2,2,0,0,0,18.039,2L16.628.584A1.993,1.993,0,0,0,15.219,0H4.619A1.988,1.988,0,0,0,2.661,1.995v3.42h0V6.651h2ZM18.291,7.982H2.993A3,3,0,0,0,0,10.975v4.656a1,1,0,0,0,1,1H3.326v3.326a1.33,1.33,0,0,0,1.33,1.33H16.628a1.33,1.33,0,0,0,1.33-1.33V16.628h2.328a1,1,0,0,0,1-1V10.975A3,3,0,0,0,18.291,7.982ZM15.963,19.289H5.321V15.3H15.963Zm3.326-4.656h-1.33a1.33,1.33,0,0,0-1.33-1.33H4.656a1.33,1.33,0,0,0-1.33,1.33H2V10.975a1,1,0,0,1,1-1h15.3a1,1,0,0,1,1,1Z" fill="#444a5a"/>
                                    </svg>
                                </div>

                                <span class="hover:underline mx-1 ">
                                    Imprimer
                                </span>
                            </div> -->


                        </div>

                        {!! view_render_event('bagisto.shop.customers.account.compare.remove_all.after') !!}
                    </div>

                    <div
                        class="journal-scroll  scrollbar-width-hidden mt-16 grid overflow-auto max-md:mt-7"
                        v-if="items.length"
                    >
<template v-for="attribute in comparableAttributes">
    <!-- Product Card -->
    <div
        class="flex items-center justify-start"
        v-if="attribute.code == 'product'"
    >
        <div class="left_side_content flex items-center">
            <p></p>
        </div>
        <div class="right_side_content">
            <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                <div class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                    v-for="product in items">
                    <!-- Your existing product card -->
                    <div class="w-full mx-auto bg-white flex flex-col" style="border-radius: 27px; height: 100%;">
                        <div class="flex justify-end w-full p-4">
                            <button @click="remove(product.id)" class="">
                                <svg class="w-6 h-6 text-end" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="h-[110px] w-full flex items-center justify-center relative" style="min-height: 110px;">
                            <img class="max-h-[110px] max-w-[150px] object-contain"
                                :src="product.societe && product.societe.logo ? product.societe.logo : product.base_image.original_image_url">
                        </div>
                        <P class="text-center px-4 mt-10 flex-grow" style="line-height: 26px;font-size:19px !important;font-family:MarkPro !important;font-weight:bold !important;">
                            @{{ product.name }}
                        </P>
                        <div class="voir_fiche w-full flex items-center justify-center pb-4">
                            <a :href="product.url_key" class="btn-card mx-4 my-2 btn-voici w-auto whitespace-nowrap new-tab" target='_blank'>
                                Voir fiche
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Add static divs when items.length < 4 -->
                <template v-for="n in 4">
                    <div
                        v-if="n > items.length"
                        class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                        :key="n"
                    >
                        <div class="w-full mx-auto bg-white flex flex-col" style="border-radius: 27px; height: 100%;">
                            <div class="h-[110px] w-full flex items-center justify-center relative" style="min-height: 200px;">
                                <img class="max-h-[110px] max-w-[150px] object-contain" src="{{ asset('ajoute_soulition.png') }}">
                            </div>
                            <p class="text-center px-4 mt-10 flex-grow"></p>
                            <div class="voir_fiche w-full flex items-center justify-center pb-4">
                                <!-- Each button triggers a unique modal -->
                                <button type="button" style="background-color: #D3D3D3 !important ; border: none !important" class="btn-card mx-4 my-2 btn-voici w-auto whitespace-nowrap"
                                    :data-modal-id="'modal-' + n"
                                    @click="openModal(n)">
                                    Ajouter une solution
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
                <!-- Include static modals with Blade -->
                @include('shop::compare.modalcompare', ['modalId' => 'modal-1'])
                @include('shop::compare.modalcompare', ['modalId' => 'modal-2'])
                @include('shop::compare.modalcompare', ['modalId' => 'modal-3'])
                @include('shop::compare.modalcompare', ['modalId' => 'modal-4'])
            </div>
        </div>
    </div>
</template>
                        <div class=" w-full my-6" style='background: #E4E4E7 0% 0% no-repeat padding-box !important;'>
                            <p class="my-4 px-4 w-full" style='font: normal normal bold 18px/20px Urbanist !important;color: #1542BE !important;'>
                                @{{ items[0].categories.name }}
                            </p>
                            <p  id="url_cat" style="display:none" > @{{ items[0].categories.url }}</p>

                        </div>
<div class="flex-1 w-full overflow-y-auto max-h-[500px]">

                        <div class=" w-full  flex" v-if="thematique !== undefined">
                            <p class="my-4 px-4 header_cycle left_side_content">
                                Thématique
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] break-all text-center   my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                   <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in thematique" v-if="thematique !== undefined">

                            <!-- Product Card -->
                             {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4" style="font-size: 1.15rem;font-family:urbanist !important;">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex">
                                <p class="my-4 px-4 header_cycle left_side_content">
                                    Fonctionnalités
                                </p>
                                <div class="right_side_content flex">
                                    <div class=" w-[311px] max-w-[311px] overflow-wrap break-words text-center   my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                       <!--  @{{ product.name }} -->
                                    </div>
                                </div>
                        </div>
                        <template v-for="attribute in functional_attributes">

                            <!-- Product Card -->
                             {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4" style="font-size: 1.15rem;font-family:urbanist !important;">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                    <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex" >
                            <p class="my-4 px-4 header_cycle left_side_content">
                            Interopérabilité
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] text-center  my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                    <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in interoperability_attributes">

                            <!-- Product Card -->
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex" v-if="compliance_attributes !== undefined">
                            <p class="my-4 px-4 header_cycle left_side_content">
                                Conformité
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words  my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                    <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in compliance_attributes" v-if="compliance_attributes !== undefined">

                            <!-- Product Card -->
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex" v-if="certification !== undefined">
                            <p class="my-4 px-4 header_cycle left_side_content">
                                Certification
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words  my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                    <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in certification" v-if="certification !== undefined">

                            <!-- Product Card -->
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex"  >
                            <p class="my-4 px-4 header_cycle left_side_content">
                            Accessibilité
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] text-center  overflow-wrap break-words  my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                    <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in Accessibility_attributes">

                            <!-- Product Card -->
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex" >
                            <p class="my-4 px-4 header_cycle left_side_content">
                            Sécurité des données
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                   <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in data_security_attributes">

                            <!-- Product Card -->
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex"  >
                            <p class="my-4 px-4 header_cycle left_side_content">
                            Support / Formation
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                   <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in support_formation_attributes">

                            <!-- Product Card -->
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex" >
                            <p class="my-4 px-4 header_cycle left_side_content">
                            Structure tarifaire
                            </p>
                            <div class="right_side_content flex">
                                <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                    <!--  @{{ product.name }} -->
                                </div>
                            </div>
                        </div>
                        <template v-for="attribute in data_tarif_attributes">

                            <!-- Product Card -->
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex" v-if="thematique_attributes.length > 0">
                                <p class="my-4 px-4 header_cycle left_side_content">
                                Thématique
                                </p>
                                <div class="right_side_content flex">
                                    <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                        <!--  @{{ product.name }} -->
                                    </div>
                                </div>
                        </div>
                        <template v-for="attribute in thematique_attributes">

                            <!-- Product Card -->
                             {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <div class=" w-full  flex"  v-if="usage_attributes.length > 0">
                                <p class="my-4 px-4 header_cycle left_side_content">
                                Utilisation
                                </p>
                                <div class="right_side_content flex">
                                    <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                       <!--  @{{ product.name }} -->
                                    </div>
                                </div>
                        </div>
                        <template v-for="attribute in usage_attributes">

                            <!-- Product Card -->
                             {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <template v-if="others_attributes && others_attributes.length">
                        <div class=" w-full  flex"  >
                                <p class="my-4 px-4 header_cycle left_side_content">
                                Autres
                                </p>
                                <div class="right_side_content flex">
                                    <div class=" w-[311px] max-w-[311px] text-center overflow-wrap break-words my-4 px-4 header_product_title max-sm:w-[190px]" v-for="product in items">
                                        <!--  @{{ product.name }} -->
                                    </div>
                                </div>
                        </div>
                        </template>
                        <template v-for="attribute in others_attributes">

                            <!-- Product Card -->
                             {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->

                            <div
                                class="flex w-full  border-b border-zinc-200"
                                style="background: #F1F1F1 0% 0% no-repeat padding-box;"
                            >
                                <div class="left_side_content flex items-center" >
                                    <p class="mx-4">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="right_side_content">
                                    <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                        <div
                                            class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                            v-for="(product, index) in items"
                                        >


                                    <div v-if="attribute.type === 'checkbox' && !product[attribute.code] ">
                                        <p class="text-center">
                                                    -
                                                </p>

                                            </div>
                                            <div v-if="attribute.type === 'text' && !product[attribute.code] ">
                                        <p class="text-center">
                                            @{{ product[attribute.code] }}
                                        </p>
                                    </div>
                                    <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'non' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                            </div>
                                        <div v-else-if="attribute.type === 'checkbox' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'oui' " class="flex justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-check" d="M9.523,13.273a1.1,1.1,0,0,1-1.547,0l-2.5-2.5A1.094,1.094,0,0,1,7.023,9.227L8.75,10.953l4.227-4.227a1.094,1.094,0,0,1,1.547,1.547ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#27986f"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && !product[attribute.code] ">

                                            <p class="text-center">
                                                    -
                                                </p>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] === 'non' " class="flex justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path id="circle-xmark" d="M6.836,6.836a.9.9,0,0,1,1.293,0l1.836,1.84,1.871-1.84a.9.9,0,0,1,1.293,0,.849.849,0,0,1,0,1.293l-1.8,1.836,1.8,1.871a.914.914,0,0,1-1.293,1.293l-1.871-1.8-1.836,1.8a.849.849,0,0,1-1.293,0,.9.9,0,0,1,0-1.293l1.84-1.871L6.836,8.129a.9.9,0,0,1,0-1.293ZM20,10A10,10,0,1,1,10,0,10,10,0,0,1,20,10ZM10,1.875A8.125,8.125,0,1,0,18.125,10,8.124,8.124,0,0,0,10,1.875Z" fill="#ff2b44"/>
                                            </svg>

                                        </div>
                                        <div v-else-if="attribute.type === 'select' && product[attribute.code] !== 'non' && product[attribute.code] !== 'oui' ">
                                            <p class="text-center">
                                                @{{ product[attribute.code] }}
                                            </p>

                                        </div>
                                        <div v-else-if="attribute.type !== 'select' && attribute.type !== 'checkbox' &&  !product[attribute.code]">
                                            <p class="text-center">
                                        -
                                            </p>

                                        </div>
                                        <div v-else class="flex justify-center">
                                            <p

                                                class="break-all text-sm"
                                                v-html="product[attribute.code] ?? '-'"
                                            >
                                            </p>
                                        </div>




                                        </div>
                                    </div>
                                </div>

                            </div>

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
                        </template>
                        <br>
                        <br>
                        <br>

                    </div>
                    </div>

                    <div
                        class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center"
                        v-else
                    >
                        <img
                            class="max-sm:h-[100px] max-sm:w-[100px]"
                            src="{{ asset('ShopImages/empty-folder.png') }}" style="max-width: 40%;"
                            alt="@lang('shop::app.compare.empty-text')"
                        />

                        <p
                            class="text-xl max-sm:text-sm"
                            role="heading"
                        >
                            @lang('shop::app.compare.empty-text')
                        </p>
                    </div>
                </div>

                <div v-else>
                    <!---- Shimmer Effect -->
                    <x-shop::shimmer.compare :attributeCount="4" />
                </div>

                {!! view_render_event('bagisto.shop.customers.account.compare.after') !!}
            </div>

        </script>

        <script type="module">
            app.component("v-compare", {
                template: '#v-compare-template',

                data() {
                    return {
                        comparableAttributes: [{
                            'code': 'product',
                            'name': 'Product'
                        }],
                        functional_attributes: [],
                        data_security_attributes: [],
                        thematique_attributes: [],
                        usage_attributes: [],
                        data_tarif_attributes: [],
                        interoperability_attributes: [],
                        compliance_attributes: [],
                        certification: [],
                        thematique: [],
                        Accessibility_attributes: [],
                        support_formation_attributes: [],
                        others_attributes: [],


                        items: [],

                        isCustomer: '{{ auth()->guard('customer')->check() }}',

                        isLoading: true,
                    }
                },

                mounted() {
                    this.getItems();

                    // Use event delegation


                    // Listen for route changes to detect internal navigation
                    this.$router.beforeEach((to, from, next) => {
                        next();
                    });
                },
                unmounted() {
                    console.log("Component unmounting");
                },

                methods: {
                    openModal(n) {
                        const btn = document.querySelector(`button[data-open="modal-${n}"]`);
                        if (btn) btn.click();
                        const modalid = `modal-${n}`;
                        setTimeout(() => loadComparisonProducts(modalid), 300);
                        // Simulate toggle button

                    },
                    getItems() {
                        let productIds = [];

                        if (!this.isCustomer) {
                            productIds = this.getStorageValue('compare_items');
                        }

                        this.$axios.get("{{ route('shop.api.compare.index') }}", {
                                params: {
                                    product_ids: productIds,
                                },
                            })
                            .then(response => {
                                //this.isLoading = false;
                                // this.isLoading = false;

                                this.items = response.data.data;
                                this.getAttributes();
                            })
                            .catch(error => {});
                    },
                    getAttributes() {
                        let productIds = [];

                        if (!this.isCustomer) {
                            productIds = this.getStorageValue('compare_items');
                        }

                        this.$axios.get("{{ route('shop.api.compare.getComparableAttributes') }}", {
                                params: {
                                    product_ids: productIds,
                                },
                            })
                            .then(response => {

                                this.isLoading = false;

                                this.functional_attributes = response.data.data.functions;
                                this.data_security_attributes = response.data.data.data_security;
                                if (response.data.data.thematique) {
                                    this.thematique_attributes = response.data.data.thematique;
                                }
                                if (response.data.data.usage) {
                                    this.usage_attributes = response.data.data.usage;
                                }
                                this.data_tarif_attributes = response.data.data.data_tarif;
                                this.interoperability_attributes = response.data.data.interoperability;
                                this.compliance_attributes = response.data.data.compliance;
                                this.thematique = response.data.data.thematique;
                                this.certification = response.data.data.certification;
                                this.Accessibility_attributes = response.data.data.Accessibility;
                                this.support_formation_attributes = response.data.data.support_formation;
                                this.others_attributes = response.data.data.others;
                            })
                            .catch(error => {});
                    },

                    remove(productId) {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                if (!this.isCustomer) {
                                    const url_cat = document.getElementById('url_cat').innerHTML;

                                    const index = this.items.findIndex((item) => item.id === productId);

                                    if (index !== -1) {
                                        this.items.splice(index, 1);
                                    }

                                    let items = this.getStorageValue()
                                        .filter(item => item != productId);

                                    localStorage.setItem('compare_items', JSON.stringify(items));

                                    let compareItems = JSON.parse(localStorage.getItem('compare_items') ||
                                        '[]');
                                    let itemCount = compareItems.length;



                                    if (itemCount === 0) {
                                        // No items left, do nothing (or return)
                                        return window.location.href = url_cat;
                                    } else {

                                        return
                                    }
                                }


                                this.$axios.post("{{ route('shop.api.compare.destroy') }}", {
                                        '_method': 'DELETE',
                                        'product_id': productId,
                                    })
                                    .then(response => {
                                        this.items = response.data.data;

                                        this.$emitter.emit('add-flash', {
                                            type: 'success',
                                            message: response.data.message
                                        });

                                    })
                                    .catch(error => {
                                        this.$emitter.emit('add-flash', {
                                            type: 'error',
                                            message: response.data.message
                                        });
                                    });
                            }
                        });
                    },
                    printDiv() {
                        const divToPrint = document.getElementById('div_print');
                        if (!divToPrint) {
                            console.error('Div with ID "div_print" not found.');
                            return;
                        }

                        // Save the original content of the page
                        const originalContent = document.body.innerHTML;

                        try {
                            // Set the body's content to the selected div's content
                            document.body.innerHTML = divToPrint.outerHTML;

                            // Trigger the print dialog
                            window.print();
                        } finally {
                            // Restore the original page content
                            document.body.innerHTML = originalContent;

                            // Reload the page to ensure proper functionality
                            location.reload();
                        }
                    },
                    removeAll() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                if (!this.isCustomer) {
                                    localStorage.removeItem('compare_items');

                                    this.items = [];

                                    this.$emitter.emit('add-flash', {
                                        type: 'success',
                                        message: "@lang('shop::app.compare.remove-all-success')"
                                    });
                                    window.location.href = '/';

                                    return;
                                }

                                this.$axios.post("{{ route('shop.api.compare.destroy_all') }}", {
                                        '_method': 'DELETE',
                                    })
                                    .then(response => {
                                        this.items = [];

                                        this.$emitter.emit('add-flash', {
                                            type: 'success',
                                            message: response.data.data.message
                                        });
                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    getStorageValue() {
                        let value = localStorage.getItem('compare_items');

                        if (!value) {
                            return [];
                        }

                        return JSON.parse(value);
                    },
                }

            });
        </script>
    @endpushOnce
</x-shop::layouts>
