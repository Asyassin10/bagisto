
@php
$routename = Route::currentRouteName();
@endphp
@if(request()->query('app') != 1)
<header class="shadow-gray sticky top-0 z-10 shadow-sm max-lg:shadow-none" style="background-color: #1A2140;">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@600&display=swap" rel="stylesheet">
    <x-shop::layouts.header.mobile />
    <x-shop::layouts.header.desktop />
</header>
@endif

@php
    $channel = core()->getCurrentChannel();
@endphp

@props(['options'])

<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
@if(request()->query('app') != 1 && $routename == "shop.home.index")

<!-- Mobile-specific styles applied -->
<div class="w-full bg-no-repeat bg-cover bg-center"
    style="background-image: url('{{ asset('ShopImages/Guide-illustrationNew.png') }}');">
    <img src="{{ asset('ShopImages/Guide-illustrationNew.png') }}" alt="Guide Illustration"
        class="invisible w-full h-auto">
</div>
@endif
