<!--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
-->
@php
    $showCompare = (bool) core()->getConfigData('catalog.products.settings.compare_option');

    $showWishlist = (bool) core()->getConfigData('customer.settings.wishlist.wishlist_option');
@endphp

<div class="flex flex-wrap gap-4 px-4 pb-4 pt-6 shadow-sm lg:hidden">
    <div class="flex w-full items-center justify-between">
        <!-- Left Navigation -->
        <div class="flex items-center gap-x-1.5">
            <x-shop::dropdown id="category-dropdown">
                <x-slot:toggle>
                    <button
                        class="flex w-full max-w-[200px] cursor-pointer items-center justify-between gap-4
                                    rounded-lg p-3.5 text-base transition-all hover:border-gray-400
                                    focus:border-gray-400 max-md:w-[110px] max-md:border-0 max-md:pl-2.5 max-md:pr-2.5"
                        style="font-family: urbanist, sans-serif; font-size: 1.438rem; font-weight: 600; color: #F5F5F5;"
                        aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-6 h-6 text-white">
                            <line x1="4" x2="20" y1="12" y2="12"></line>
                            <line x1="4" x2="20" y1="6" y2="6"></line>
                            <line x1="4" x2="20" y1="18" y2="18"></line>
                        </svg>

                    </button>
                </x-slot>

                <x-slot:menu>
                    <ul id="category-menu" class="dropdown-menu space-y-2">
                        <li class="text-center py-2"
                            style="font-family: urbanist, sans-serif; font-size: 1rem; font-weight: 600;">
                            Loading...
                        </li> <!-- Loading state -->
                    </ul>
                </x-slot>
            </x-shop::dropdown>
        </div>

        <!-- Right Navigation -->
        <div>
            <div class="flex items-center gap-x-5 max-md:gap-x-4">

                <!-- For Large screens -->
                <div class="max-md:hidden">
                    <x-shop::dropdown
                        position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}">
                        <x-slot:toggle>
                            <svg id="connexion" xmlns="http://www.w3.org/2000/svg" width="41" height="41"
                                viewBox="0 0 41 41">
                                <path id="circle-user"
                                    d="M20.5,0A20.5,20.5,0,1,0,41,20.5,20.5,20.5,0,0,0,20.5,0Zm0,38.438a17.823,17.823,0,0,1-10.186-3.19,7.674,7.674,0,0,1,7.623-7.06h5.125a7.672,7.672,0,0,1,7.624,7.06A17.854,17.854,0,0,1,20.5,38.438Zm12.468-5.069a10.25,10.25,0,0,0-9.906-7.744H17.938A10.248,10.248,0,0,0,8.032,33.37a17.938,17.938,0,1,1,24.936,0ZM20.5,10.25a6.406,6.406,0,1,0,6.406,6.406A6.4,6.4,0,0,0,20.5,10.25Zm0,10.25a3.844,3.844,0,1,1,3.844-3.844A3.845,3.845,0,0,1,20.5,20.5Z"
                                    fill="#f5f5f5"></path>
                            </svg>
                        </x-slot>

                        <!-- Guest Dropdown -->
                        <x-slot:content>
                            <div class="grid gap-2.5">
                                <p class="font-dmserif text-xl">
                                    @lang('shop::app.components.layouts.header.welcome-guest')
                                </p>

                                <p class="text-sm">
                                    @lang('shop::app.components.layouts.header.dropdown-text')
                                </p>
                            </div>

                            <p class="py-2px mt-3 w-full border border-zinc-200"></p>

                            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.index.customers_action.before') !!}

                            <div class="mt-6 flex gap-4">
                                {!! view_render_event('bagisto.shop.components.layouts.header.mobile.index.sign_in_button.before') !!}

                                <a href="{{ route('logout.cas') }}"
                                    class="m-0 mx-auto block w-max cursor-pointer rounded-2xl bg-navyBlue px-7 py-4 text-center text-base font-medium text-white ltr:ml-0 rtl:mr-0">
                                    @lang('shop::app.components.layouts.header.sign-in')
                                </a>

                                <a href="{{ route('shop.customers.register.index') }}"
                                    class="m-0 mx-auto block w-max cursor-pointer rounded-2xl border-2 border-navyBlue bg-white px-7 py-3.5 text-center text-base font-medium text-navyBlue ltr:ml-0 rtl:mr-0">
                                    @lang('shop::app.components.layouts.header.sign-up')
                                </a>

                                {!! view_render_event('bagisto.shop.components.layouts.header.mobile.index.sign_in_button.after') !!}
                            </div>

                            {!! view_render_event('bagisto.shop.components.layouts.header.mobile.index.customers_action.after') !!}
                        </x-slot>
                    </x-shop::dropdown>
                </div>

                <!-- For Medium and small screen -->
                <div class="md:hidden">
                    <a href="{{ route('logout.cas') }}" aria-label="@lang('shop::app.components.layouts.header.account')">
                        <svg id="connexion" xmlns="http://www.w3.org/2000/svg" width="41" height="41"
                            viewBox="0 0 41 41">
                            <path id="circle-user"
                                d="M20.5,0A20.5,20.5,0,1,0,41,20.5,20.5,20.5,0,0,0,20.5,0Zm0,38.438a17.823,17.823,0,0,1-10.186-3.19,7.674,7.674,0,0,1,7.623-7.06h5.125a7.672,7.672,0,0,1,7.624,7.06A17.854,17.854,0,0,1,20.5,38.438Zm12.468-5.069a10.25,10.25,0,0,0-9.906-7.744H17.938A10.248,10.248,0,0,0,8.032,33.37a17.938,17.938,0,1,1,24.936,0ZM20.5,10.25a6.406,6.406,0,1,0,6.406,6.406A6.4,6.4,0,0,0,20.5,10.25Zm0,10.25a3.844,3.844,0,1,1,3.844-3.844A3.845,3.845,0,0,1,20.5,20.5Z"
                                fill="#f5f5f5"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search.before') !!}

    <!-- Serach Catalog Form -->
    <form action="{{ route('shop.search.index') }}" class="flex items-center w-full" role="search">

       {{--  @if (Route::currentRouteName() === 'shop.product_or_category.index')
            <div id="dynamic-category-container_mobile" class="absolute flex items-center px-2 py-1"
                style="margin-left: 6%; border: 1px solid #707070; border-radius: 24px; opacity: 1;">
            </div>
        @endif --}}
        <input id="query_input_mobile" type="text" name="query" onclick="hideContent()"
            class="mx-4 block rounded-full border border-transparent bg-zinc-100 px-4 py-2 text-xs
                      font-medium text-gray-900 transition-all hover:border-gray-400 focus:border-gray-400"
            minlength="0" maxlength="1000" aria-label="Recherchez des produits ici" aria-required="true" required
            value=""
            style="flex-grow: 1;
                      background: #FFFFFF 0% 0% no-repeat padding-box;
                      border: 1px solid #DFE1E5; border-radius: 35px; opacity: 1;
                      height:95%">

    </form>

    {!! view_render_event('bagisto.shop.components.layouts.header.mobile.search.after') !!}

</div>
