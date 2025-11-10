@php
    $channel = core()->getCurrentChannel();
    use Illuminate\Support\Str;
    $searchTerm = $searchTerm ?? null; // Default to null if not set
@endphp

<!-- SEO Meta Content -->
@push('meta')
<style>
    /* Make sure your card has relative positioning */
    /* Make sure your card has relative positioning */


    .card {
        position: relative;
    }



    /* Alternative - Diagonal ribbon banner style */
    .badge-congres-ribbon {
        position: absolute;
        top: 25px;
        right: -42px;
        background-color: #10b981;
        color: white;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 40px;
        transform: rotate(32deg);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        white-space: nowrap;
        min-width: 120px;
        text-align: center;
    }

    .responsive-grid-parent {
        background-color: #FBFBFB;
        padding: 120px;
        /* Default padding */
        padding-top: 20px;
        /* Add space above the cards */
    }

    /* Adjust padding for smaller screens */
    @media (max-width: 1027px) {
        .responsive-grid-parent {
            padding: 60px;
            /* Adjust padding for screens <= 1027px */
            padding-top: 15px;
            /* Add space above the cards */
        }
    }

    @media (max-width: 877.71px) {
        .responsive-grid-parent {
            padding: 30px;
            /* Adjust padding for screens <= 877.71px */
            padding-top: 10px;
            /* Add space above the cards */
        }
    }

    @media (max-width: 640px) {
        .responsive-grid-parent {
            padding: 15px;
            /* Adjust padding for screens <= 640px */
            padding-top: 5px;
            /* Add space above the cards */
        }
    }

    .responsive-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* Default to 3 columns */
        gap: 20px;
        /* Increase gap between cards */
        padding: 0 2rem;
        /* Horizontal padding */
        width: 100%;
        box-sizing: border-box;
        /* Include padding in width */
    }


    @media (max-width: 1180px) {
        .responsive-grid {
            grid-template-columns: repeat(2, 1fr);
            /* 2 columns for viewport width <= 1180px */
            padding: 0 1rem;
            /* Adjust padding for smaller screens */
        }
    }

    @media (max-width: 877.71px) {
        .responsive-grid {
            grid-template-columns: 1fr;
            /* 1 column for viewport width <= 877.71px */
            padding: 0;
            /* Remove padding for very small screens */
        }
    }

    @media (max-width: 640px) {

        /* Additional mobile-specific styles */
        .responsive-grid {
            padding: 0;
            /* Ensure no extra padding on mobile */
        }
    }

    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
        /* Ensure the card takes full height */
        border: 1px solid #F5F5F5;
        overflow: hidden;
        background: #FFFFFF 0% 0% no-repeat padding-box;
        border: 1px solid #F5F5F5;
        border-radius: 27px;
        opacity: 1;
        width: 95%;
        /* Adjust this value as needed */
    }

    .card img {
        width: 5rem !important;
        /* Make the image span the full width of its container */
        object-fit: contain;
        /* Ensure the image covers the container while maintaining its aspect ratio */
    }

    .card-content {
        flex: 1;
        /* Ensure content area grows to fill available space */
        padding: 16px;
        display: flex;
        flex-direction: column;
    }

    .card-footer {
        padding: 16px;
        text-align: center;
        background: #FFFFFF 0% 0% no-repeat padding-box;
    }

    .truncate-description {
        margin-top: 3%;
        display: -webkit-box;
        -webkit-line-clamp: 5;
        /* Limit to 5 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.4;
        /* Adjust line-height if necessary */
        max-height: 7em;
        /* Adjust max-height based on line-height */
        text-align: left;
        font: normal normal normal 16px/23px MarkPro;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
    }

    .truncate-name {
        margin-left: 2%;
        text-align: left;
        font: normal normal bold 19px/26px MarkPro !important;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
        line-height: 26px;
    }

    .btn-card {
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
    }

    .btn-card:hover {
        background-color: #FBC400;
        /* Optional: Change color on hover */
    }

    .text-solutions {
        font-size: 20px !important;
    }
</style>
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ $channel->home_seo['meta_title'] ?? '' }}
        </x-slot>



        <div class="responsive-grid-parent w-full mt-4">

            <div class="w-full flex justify-center items-center">
                <h1 class=" text-solutions  font-medium ">
                    {{ $products_count }} solutions

                </h1>
            </div>

            <div class="responsive-grid w-full mt-4">


                @if (isset($searchTerm) || !is_null($searchTerm))
                    @foreach ($searchTerm as $product)
                        <div class="card">

                            @if ($product->is_congrate_partner && $product->is_congrate_partner == true)
                                <!-- OR Option 2: Ribbon style -->
                                <div class="badge-congres-ribbon">
                                    Partenaire Congrès {{ date('Y') }}

                                </div>
                            @endif

                            <div class="card-content">
                                <div class="w-full flex items-center">
                                    <div class="w-1/3">
                                        @if ($product->societe && $product->societe->logo)
                                            <img class="w-full h-16" src="/{{ $product->societe->logo }}">
                                        @else
                                            <img class="w-full h-auto"
                                                src="{{ url('themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp') }}">
                                        @endif
                                    </div>
                                    <div class="w-full">
                                        <p class="truncate-name">
                                            {{ $product->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <p class="truncate-description">
                                        {!! Str::limit($product->description, 300, '...') !!}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('shop.product_or_category.index', '') }}/{{ $product->url_key }}"
                                    class="btn-card">
                                    Voir la fiche
                                </a>
                            </div>
                        </div>
                    @endforeach

                @endif

            </div>

            <div class="pagination-wrapper mt-6 flex justify-center">
                @if (isset($searchTerm) || !is_null($searchTerm))
                    {{ $searchTerm->links('vendor.pagination.tailwind') }}
                @endif
            </div>
        </div>

</x-shop::layouts>