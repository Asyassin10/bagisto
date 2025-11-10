@props([
    'hasHeader' => true,
    'hasFeature' => true,
    'hasFooter' => true,
])
@php
    $routename = Route::currentRouteName();
@endphp
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">

<head>

    {!! view_render_event('bagisto.shop.layout.head.before') !!}

    <title>{{ $title ?? '' }}</title>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url()->to('/') }}">
    <meta name="currency" content="{{ core()->getCurrentCurrency()->toJson() }}">


    @stack('meta')

    <link rel="icon" sizes="16x16" href="{{ asset('favicon-32x32.png') }}" />
    @if ($routename == 'admin.catalog.products.visualize')
        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'], 'shop')
    @else
        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])
    @endif

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        as="style">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap">

    <link rel="stylesheet" href="{{ asset('app.css') }}">
    @stack('styles')

    <style>
        {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!} #main {
            background: #FBFBFB 0% 0% no-repeat padding-box;
            opacity: 1;

        }
    </style>

    {!! view_render_event('bagisto.shop.layout.head.after') !!}
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Urbanist' rel='stylesheet'>
    <!-- Matomo -->
    <script>
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(["setDoNotTrack", true]);
        _paq.push(["setExcludedQueryParams", ["ticket"]]);
        _paq.push(["disableCookies"]);
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u = "{{ config('matomo.url') }}"; // Matomo URL
            _paq.push(['setTrackerUrl', u + 'matomo.php']);
            _paq.push(['setSiteId', "{{ config('matomo.id') }}"]); // Site ID
            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];
            g.async = true;
            g.src = u + 'matomo.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <noscript>
        <p><img src="{{ config('matomo.url') }}matomo.php?idsite={{ config('matomo.id') }}&amp;rec=1"
                style="border:0;" alt="" /></p>
    </noscript>
    <!-- End Matomo Code -->
    <!-- tarteaucitron -->
    <script src="{{ asset('tarteaucitron/tarteaucitron.js') }}"></script>
    <script type="text/javascript">
        tarteaucitron.init({
            "privacyUrl": "", // Privacy policy url
            "bodyPosition": "bottom", // or top for accessibility
            "hashtag": "#tarteaucitron", // Open the panel with this hashtag
            "cookieName": "tarteaucitron", // Cookie name
            "orientation": "middle", // Banner position (top - bottom)
            "groupServices": false, // Group services by category
            "showDetailsOnClick": true, // Click to expand the description
            "serviceDefaultState": "wait", // Default state (true - wait - false)
            "showAlertSmall": false, // Show the small banner on bottom right
            "cookieslist": false, // Show the cookie list
            "closePopup": false, // Show a close X on the banner
            "showIcon": true, // Show cookie icon to manage cookies
            "iconPosition": "BottomRight", // Icon position
            "adblocker": false, // Show a Warning if an adblocker is detected
            "DenyAllCta": true, // Show the deny all button
            "AcceptAllCta": true, // Show the accept all button when highPrivacy on
            "highPrivacy": true, // HIGHLY RECOMMANDED Disable auto consent
            "alwaysNeedConsent": false, // Ask for consent for "Privacy by design" services
            "handleBrowserDNTRequest": false, // Disallow all if Do Not Track == 1
            "removeCredit": false, // Remove credit link
            "moreInfoLink": true, // Show more info link
            "useExternalCss": false, // Load default CSS file
            "useExternalJs": false, // Load default JS file
            "readmoreLink": "", // Change the default readmore link
            "mandatory": true, // Show message about mandatory cookies
            "mandatoryCta": true, // Show disabled accept button when mandatory
            "googleConsentMode": true, // Enable Google Consent Mode v2
            "partnersList": false // Show the number of partners on the popup
        });
    </script>

    <!-- END tarteaucitron -->

</head>

<body>
    {!! view_render_event('bagisto.shop.layout.body.before') !!}


    <div id="app" class="bg-[#FBFBFB]">
        <!-- Flash Message Blade Component -->
        <x-shop::flash-group />

        <!-- Confirm Modal Blade Component -->
        <x-shop::modal.confirm />

        <!-- Page Header Blade Component -->
        @if ($hasHeader)
            <x-shop::layouts.header />
        @endif

        {!! view_render_event('bagisto.shop.layout.content.before') !!}

        <!-- Page Content Blade Component -->
        <main id="main">
            {{ $slot }}
        </main>

        {!! view_render_event('bagisto.shop.layout.content.after') !!}


        <!-- Page Services Blade Component -->
        {{--    @if ($hasFeature)
                <x-shop::layouts.services />
            @endif --}}

        <!-- Page Footer Blade Component -->
        @if ($hasFooter)
            <x-shop::layouts.footer />
        @endif
    </div>

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.before') !!}
    <script>
        /**
         * Load event, the purpose of using the event is to mount the application
         * after all of our `Vue` components which is present in blade file have
         * been registered in the app. No matter what `app.mount()` should be
         * called in the last.
         */
        window.addEventListener("load", function(event) {
            app.mount("#app");
        });
    </script>

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.after') !!}

    <script type="text/javascript">
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>



    @if ($routename == 'shop.compare.index')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
    // Define excluded paths
    const excludedPaths = ["/mentions-legales", "/compare"];
    const excludedIds = ["excluded_space", "excluded_logout"];

    document.body.addEventListener("click", (event) => {
        let element = event.target;

        // Traverse up to find the closest <a> element (in case of nested tags)
        while (element && element.tagName !== "A") {
            element = element.parentElement;
        }

        // If it's not an <a>, do nothing
        if (!element || !element.href) return;

        // Skip if the element has class "new-tab"
        if (element.classList.contains("new-tab")) {
            return;
        }

        // Skip if it's in the excluded IDs
        if (excludedIds.includes(element.id)) {
            return;
        }

        const targetUrl = new URL(element.href);
        const targetPath = targetUrl.pathname + targetUrl.hash;

        // Check if the target path is in the excluded list
        if (!excludedPaths.includes(targetPath)) {
            event.preventDefault(); // Prevent immediate navigation

            const confirmMessage = "Les critères de comparaison vont être réinitialisés en quittant cette page.";
            if (confirm(confirmMessage)) {
                window.location.href = element.href;
            } else {
                console.log("Navigation canceled by the user.");
            }
        }
    });

    window.addEventListener("beforeunload", (event) => {
        const currentPath = window.location.pathname + window.location.hash;
        if (!excludedPaths.includes(currentPath)) {
            const confirmMessage = "Les critères de comparaison vont être réinitialisés en quittant cette page.";
            event.returnValue = confirmMessage;
            return confirmMessage;
        }
    });
});

        </script>
    @endif
</body>

</html>
