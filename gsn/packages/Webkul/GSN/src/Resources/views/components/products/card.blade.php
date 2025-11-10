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
            /* Horizontal padding */
            width: 400%;
            box-sizing: border-box;
            /* Include padding in width */
            height: 100%;
            place-items: start;
            /* Centers both horizontally and vertically */
        }



        @media (max-width: 877.71px) {
            .responsive-grid {
                grid-template-columns: 1fr;
                width: 100%;
                padding: 0;
                place-items: center;

            }
        }

        @media (max-width: 640px) {

            .responsive-grid {
                padding: 0;
                width: 100%;
                place-items: center;
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
            border: 1px solid #F5F5F5;
            overflow: hidden;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #F5F5F5;
            border-radius: 27px;
            opacity: 1;
            width: 85%;
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
            letter-spacing: 0px;
            text-align: left;
            letter-spacing: 0px;
            color: #000000;
            opacity: 1;
            font: normal normal normal 16px/23px MarkPro !important;
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

        .truncate-name-desc {
            margin-left: 5%;
            text-align: left;
            font: normal normal bold 19px/26px MarkPro;
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

        .comparator-item {
            position: relative;
            cursor: pointer;
        }

        .comparator-item a {
            display: flex;

            color: inherit;
        }

        .comparator-item:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
    </style>
@endpush
@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">
    <div class="responsive-grid w-full ">
        <div class="card" v-if="product">
                <div class="badge-congres-ribbon" v-if="product.is_congrate_partner">
        Partenaire Congrès {{ date('Y') }}

    </div>
            <div class="card-content ">
                <div class="w-full flex items-center">
                    <div class="w-1/3">
                        <img class="w-full h-auto"
                            :src="product.societe && product.societe.logo ? product.societe.logo : product.base_image.original_image_url">
                    </div>
                    <div class="w-full items-center">
                        <p class="truncate-name">
                            @{{ product.name }}
                        </p>
                    </div>
                </div>
                <div class="w-full">
                <div class="truncate-description-card"  >@{{ product.description }}</div>

                </div>
            </div>
            <div class="card-footer flex md:block justify-between items-center">
                @if (!str_contains(request()->url(), '/autre'))
                <a href="#" class="btn-card comparer-btn" :class="'comparer-btn-' + product.id" @click.prevent="addToCompare(product.id)">
                    Comparer
                </a>

            @endif

                <a :href="product.url_key" class="btn-card btn-voici my-2  mx-2 ">
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
                addToCompare(productId) {
                    this.addToCompareForGuest(productId);
                },

                addToCompareForGuest(productId) {
                    let compareItems = this.getStorageValue();
                    let comparer_btn = document.querySelector('.comparer-btn-' + productId);
                    if (compareItems.length >= 4) {
                        this.emitFlashMessage('warning',
                            "Vous ne pouvez pas comparer plus de 4 logiciels.");
                        this.showComparator(compareItems.length);
                        // this.updateComparatorUI(compareItems);
                        this.renderComparatorContent(response.data.data);
                        return;
                    }
                    if (compareItems.includes(productId)) {

                        this.emitFlashMessage('warning', "@lang('shop::app.components.products.card.already-in-compare')");
                        return;
                    }
                    // Fetch the details of the products to compare
                    this.$axios.post('{{ route('getproducts_new') }}', {
                            product_ids: [...compareItems, productId] // include the new product in the request
                        })
                        .then(response => {
                            const products = response.data.data;

                            // Extract categories from the products
                            const categories = products.map(product => product.categories[0]);
                            console.log(" categories is : " + categories)
                            // Check if all products belong to the same category
                            const uniqueCategories = [...new Set(categories)];
                            if (uniqueCategories.length > 1) {
                                //   this.updateComparatorUI(compareItems);
                                this.renderComparatorContent(response.data.data);
                                this.showComparator(compareItems.length);
                                this.emitFlashMessage('warning',
                                    "Vous ne pouvez pas comparer des logiciels de catégories différentes.");
                                return;
                            }
                            compareItems.push(productId);
                            comparer_btn.innerHTML = "✔ Comparer";
                            //comparer_btn.classList.add('selected');
                            localStorage.setItem('compare_items', JSON.stringify(compareItems));
                            this.emitFlashMessage('success', "@lang('shop::app.components.products.card.add-to-compare-success')");

                            //  this.updateComparatorUI(compareItems);
                            this.renderComparatorContent(response.data.data);
                            this.showComparator(compareItems.length);
                        })
                        .catch(error => {
                            this.emitFlashMessage('error', "Erreur lors de la récupération des logiciels.");
                            console.error(error);
                        });
                },

                renderComparatorContent(products) {
                    const container = document.querySelector('.comparator-items-container');
                    container.innerHTML = '';

                    products.forEach(product => {
                        const item = this.createComparatorItem(product);
                        container.appendChild(item);
                    });
                },

                /* createComparatorItem(product) {
                    const item = document.createElement('div');
                    item.className = 'comparator-item';
                    console.log("product is : " + JSON.stringify(product));
                    // Create a clickable link that wraps the entire item

                    const containers = document.querySelectorAll('.comparator-items-container');
                    const link = document.createElement('a');
                    link.href = product.url || '#'; // Make sure your product data includes a URL
                    link.target = '_blank'; // Open in new tab
                    link.style.display = 'flex';
                    link.style.width = '100%';

                    link.style.textDecoration = 'none';
                    link.style.color = 'inherit';

                    link.innerHTML = `
                    <img src="${product.socites && product.socites.logo ? product.socites.logo : "themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"}" alt="${product.name}">
                    <div class="comparator-item-details">
                        <div class="comparator-item-title">${product.name}  </div>
                      <button class="comparator-item-bbtn" onclick="alert('Item removed')">X</button>
                    </div>
                `;

                 //   containers[0].appendChild(span);
                    item.appendChild(link);
                    return item;
                }, */
                createComparatorItem(product) {
                    /*
                    console.log("product----------------------------------------------------product")
                    console.log(JSON.stringify(product))

                    console.log("product----------------------------------------------------product")
                    */

                    const item = document.createElement('div');
                    item.className = 'comparator-item';
                    item.style.display = 'flex'; // Make container flex
                    item.style.alignItems = 'center'; // Vertically center content
                    item.style.justifyContent = 'space-between'; // Space between link and button
                    item.style.width = '100%';

                    console.log("product is : " + JSON.stringify(product));

                    const containers = document.querySelectorAll('.comparator-items-container');

                    // Create the clickable link (WITHOUT the button inside)
                    const link = document.createElement('a');
                    link.href = product.url || '#';
                    link.target = '_blank';
                    link.style.display = 'flex';
                    link.style.flex = '1'; // Take up remaining width
                    link.style.textDecoration = 'none';
                    link.style.color = 'inherit';
                    link.style.alignItems = 'center'; // Align image and text vertically

                    link.innerHTML = `
        <img src="${product.socites && product.socites.logo ? product.socites.logo : "themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"}" alt="${product.name}" style="width:50px; height:50px; object-fit: contain; margin-right: 10px;">
    <div class="comparator-item-details" id="comparator-item-details_id_${product.product_id}">


                <div class="comparator-item-title">${product.name}</div>
            </div>
        `;

                    // Create the button outside the link
                    const btn = document.createElement('button');
                    btn.className = 'comparator-item-bbtn';
                    btn.textContent = 'X';
                    btn.style.marginLeft = '10px';
                    btn.setAttribute('data-id', product.product_id); //

                    btn.onclick = () => {
                        const item_compare = document.querySelectorAll(
                        '.comparator-item'); // Select the element
                        const classCount = item_compare.length;
                        console.log("classCount")
                        console.log(classCount)
                        console.log("classCount")
                        const countElement = document.getElementById('count-comparator');
                        countElement.innerHTML = ` (${classCount-1}/4)`;
                        item.remove();
                        const productId = btn.getAttribute('data-id');
                        let compareItems = JSON.parse(localStorage.getItem('compare_items') || '[]');
                        compareItems = compareItems.filter(id => id != productId);
                        localStorage.setItem('compare_items', JSON.stringify(compareItems));
                        let comparer_btn = document.querySelector('.comparer-btn-' + productId);
                        comparer_btn.innerHTML = "Comparer";

                        /*
                             console.log("----------------------------------------compareItems.length------------------------------------------------------")

                              console.log(compareItems.length)


                              console.log("----------------------------------------compareItems.length------------------------------------------------------")

                        */
                    };

                    // Append link and button as siblings
                    item.appendChild(link);
                    item.appendChild(btn);

                    return item;
                },


                showComparator(count) {
                    const modal = document.getElementById('modal-compar');
                    const countElement = document.getElementById('count-comparator');
                    modal.style.display = 'block';
                    countElement.innerHTML = ` (${count}/4)`;
                },

                getStorageValue() {
                    let value = localStorage.getItem('compare_items');
                    return value ? JSON.parse(value) : [];
                },

                emitFlashMessage(type, message) {
                    this.$emitter.emit('add-flash', {
                        type,
                        message
                    });
                },
            },
        });
    </script>
@endpushOnce
