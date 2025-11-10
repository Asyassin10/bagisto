<v-product-card {{ $attributes }} :product="product">
</v-product-card>
@push('styles')
    <style>
        .card {
    position: relative;
}



/* Alternative - Diagonal ribbon banner style */
.badge-congres-ribbon {
position: absolute;
    top: 15px;
    right: -42px;
    background-color: #10b981;
    color: white;
    font-size: 8px;
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
            width: 300%;
            box-sizing: border-box;
            /* Include padding in width */
            height: 100%;

        }


        @media (max-width: 1180px) {
            .responsive-grid {
                grid-template-columns: repeat(2, 1fr);
                width: 100%;
                padding: 0 1rem;
            }
        }

        @media (max-width: 877.71px) {
            .responsive-grid {
                grid-template-columns: 1fr;
                width: 100%;
                padding: 0;

            }
        }

        @media (max-width: 640px) {

            .responsive-grid {
                padding: 0;
                width: 100%;
            }
        }

        @media (max-width: 1180px) {
            .div-grid-card {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        @media (max-width: 877.71px) {
            .div-grid-card {
                grid-template-columns: repeat(1, 1fr);

            }
        }

        @media (max-width: 640px) {

            .div-grid-card {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            /* Ensure the card takes full height */
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

        .truncate-description-card {
            margin-top: 3%;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.4;
            /* Adjust max-height based on line-height */
            letter-spacing: 0px;
            text-align: left;
            font: normal normal normal 16px/23px MarkPro;
            letter-spacing: 0px;
            color: #000000;
            opacity: 1;
        }

        .truncate-name {

            text-align: left;
            font: normal normal bold 19px/26px MarkPro !important;
            letter-spacing: 0px;
            color: #000000;
            opacity: 1;
            line-height: 26px;

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
        }

        .btn-voici:hover {
            background-color: #FBC400;
            /* Optional: Change color on hover */
        }

        .comparer-btn {
            text-align: left;
            font: normal normal 600 16px/19px Urbanist, sans-serif;
            letter-spacing: 0px;
            color: #F5F5F5;
            background: #27986F 0% 0% no-repeat padding-box;
            box-shadow: 0px 1px 3px #00000029;
            border: 1px solid #27986F;
            border-radius: 27px;
            opacity: 1;
            padding: 10px 15px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
@endpush
@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">
        <div class="responsive-grid w-full" style="padding-bottom:20px !important;">
            <div class="card" v-if="product">
        <div class="card" v-if="product">
                <div class="badge-congres-ribbon" v-if="product.is_congrate_partner">
        Partenaire Congrès {{ date('Y') }}

    </div>
                <div class="card-content">
                    <div class="w-full " style="">
                        <div class="w-full flex justify-center">
                            <img class="w-full h-auto"
                             :src="product.societe && product.societe.logo ? product.societe.logo : product.base_image.original_image_url">
                        </div>
                        <div class="w-full flex justify-center items-center">
                            <p class="truncate-name text-center w-full" style="text-align:center;">
                                @{{ product.name }}
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                {{--    <div class="truncate-description-card"  >@{{ product.short_description }}</div> --}}

                    </div>
                </div>
                <div class="card-footer flex justify-center">
                {{--   <a href="#" class="btn-card comparer-btn" @click.prevent="addToCompare(product.id)">
                        Comparer
                    </a> --}}
                    <a :href="product.url_key" class="btn-card btn-voici">
                        Voir la fiche
                    </a>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-product-card', {
            template: '#v-product-card-template',

            props: ['product'],

            data() {
                return {
                    isCustomer: '{{ auth()->guard('customer')->check() }}',
                    isAddingToCart: false,
                }
            },

            methods: {
                addToWishlist() {
                    if (this.isCustomer) {
                        this.$axios.post(`{{ route('shop.api.customers.account.wishlist.store') }}`, {
                                product_id: this.product.id
                            })
                            .then(response => {
                                this.product.is_wishlist = !this.product.is_wishlist;

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

                    let items = this.getStorageValue() ?? [];

                    if (items.length) {
                        if (!items.includes(productId)) {
                            items.push(productId);

                            localStorage.setItem('compare_items', JSON.stringify(items));

                            this.$emitter.emit('add-flash', {
                                type: 'success',
                                message: "@lang('shop::app.components.products.card.add-to-compare-success')"
                            });
                        } else {
                            this.$emitter.emit('add-flash', {
                                type: 'warning',
                                message: "@lang('shop::app.components.products.card.already-in-compare')"
                            });
                        }
                    } else {
                        localStorage.setItem('compare_items', JSON.stringify([productId]));

                        this.$emitter.emit('add-flash', {
                            type: 'success',
                            message: "@lang('shop::app.components.products.card.add-to-compare-success')"
                        });
                    }
                },

                getStorageValue() {
                    let value = localStorage.getItem('compare_items');
                    return value ? JSON.parse(value) : [];
                },

                addToCart() {
                    this.isAddingToCart = true;

                    this.$axios.post('{{ route('shop.api.checkout.cart.store') }}', {
                            'quantity': 1,
                            'product_id': this.product.id,
                        })
                        .then(response => {
                            if (response.data.message) {
                                this.$emitter.emit('update-mini-cart', response.data.data);

                                this.$emitter.emit('add-flash', {
                                    type: 'success',
                                    message: response.data.message
                                });
                            } else {
                                this.$emitter.emit('add-flash', {
                                    type: 'warning',
                                    message: response.data.data.message
                                });
                            }

                            this.isAddingToCart = false;
                        })
                        .catch(error => {
                            this.$emitter.emit('add-flash', {
                                type: 'error',
                                message: error.response.data.message
                            });

                            if (error.response.data.redirect_uri) {
                                window.location.href = error.response.data.redirect_uri;
                            }

                            this.isAddingToCart = false;
                        });
                },
            },
        });
    </script>
@endpushOnce
