{!! view_render_event('bagisto.shop.layout.footer.before') !!}

<!--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
-->
@inject('themeCustomizationRepository', 'Webkul\Theme\Repositories\ThemeCustomizationRepository')

<!--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
-->
{{-- @php
    $customization = $themeCustomizationRepository->findOneWhere([
        'type' => 'footer_links',
        'status' => 1,
        'channel_id' => core()->getCurrentChannel()->id,
    ]);
@endphp --}}
@php
    /* usort($footerLinkSection, function ($a, $b) {
            return $a['sort_order'] - $b['sort_order'];
            }); */
    $footerLinkSection = [
        [
            'title' => 'Mentions légales',
            'url' => 'https://extranet.experts-comptables.org/download/document/f05916de-a920-4ec7-933d-1411288eff28/pdf',
        ],
        [
            'title' => 'Gestion des cookies',
            'url' => '#',
        ],
    ];
@endphp
@if(request()->query('app') != 1)

<footer class=" bg-[#E4E4E7]  font-bold  mt-[80px] relative bottom-0">
    <div
        class="flex  justify-between gap-x-6 gap-y-8 px-[60px] py-[20px] max-1060:flex-col-reverse max-md:gap-5 max-md:p-8 max-sm:px-4 max-sm:py-5">
        <!-- For Desktop View -->
        <div class="flex flex-wrap items-start gap-24 max-1180:gap-6 max-1060:hidden w-4/6 ">
            {{-- @if ($customization?->options) --}}

            <div class=" text-sm flex  w-full justify-start">

                @foreach ($footerLinkSection as $link)
                    <a href="{{ $link['url'] }}"
                    class="mx-[5px] px-[5px] block hover:underline footer_disabled_event"
                     style="font: normal normal 500 16px/23px MarkPro;"
                    @if ($link['title'] !== 'Gestion des cookies' && $link['title'] !== 'CGU' ) target="_blank" @endif
                    @if ($link['title'] === 'Gestion des cookies') onclick="tarteaucitron.userInterface.openPanel(); return false;" @endif>
                        {{ $link['title'] }}
                    </a>
                @endforeach
            </div>

        </div>

        <!-- For Mobile view -->
        <x-shop::accordion :is-active="false"
            class="hidden !w-full rounded-xl !border-2 !border-none max-1060:block max-sm:rounded-lg">
            <x-slot:header
                class="rounded-t-lg hidden bg-gray-200 font-medium max-md:p-2.5 max-sm:px-3 max-sm:py-2 max-sm:text-sm">
                @lang('shop::app.components.layouts.footer.footer-content')
            </x-slot>

            <x-slot:content class="flex justify-between !bg-transparent !p-4">
                {{-- @if ($customization?->options) --}}

                <ul class="grid gap-5 text-sm">


                    @foreach ($footerLinkSection as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-sm font-medium max-sm:text-xs medium-mark-pro footer_disabled_event"
                            @if ($link['title'] !== 'Gestion des cookies' && $link['title'] !== 'CGU' ) target="_blank" @endif
                            @if ($link['title'] === 'Gestion des cookies') onclick="tarteaucitron.userInterface.openPanel(); return false;" @endif
                            style="font: normal normal 500 16px/23px MarkPro;"
                            >
                                {{ $link['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- @endif --}}
            </x-slot>
        </x-shop::accordion>

        {!! view_render_event('bagisto.shop.layout.footer.newsletter_subscription.before') !!}

        <!-- News Letter subscription -->
        {{-- @if (core()->getConfigData('customer.settings.newsletter.subscription')) --}}
        <div class="grid gap-2.5 ">


            <p class=" medium-mark-pro">
                © Ordre des experts-comptables - 2024
            </p>

        </div>

        {!! view_render_event('bagisto.shop.layout.footer.newsletter_subscription.after') !!}
    </div>

</footer>

@endif


{!! view_render_event('bagisto.shop.layout.footer.after') !!}
