@props(['options'])
@php
    $channel = core()->getCurrentChannel();
@endphp
<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

<div class="h-100 p-6 bg-[#2A354F] text-center " style="background-color: #2A354F;">
    <h1 class="text-white text-4xl font-bold mb-8" style="font: normal normal bold 40px / 20px MarkPro;">
        {{ $channel->home_seo['meta_title'] ?? '' }}
    </h1>
    <div class="w-full flex items-center justify-center mb-8">
        <img src="{{ asset('ShopImages/Guide-illustration.png') }}" alt=""
            class="w-[670px] h-[121px] opacity-100">
    </div>

    <p class="text-white text-lg leading-7 ml-5"
        style="text-align: left;margin-left:8%;font: normal normal normal 18px/25px MarkPro;
    ">
        {{ $channel->home_seo['meta_description'] ?? '' }}
    </p>
</div>
