export default {
    template: '#v-product-card-template',
    props: ['product'],
    data() {
        return {
            isCustomer: false,
            isAddingToCart: false,
            windowOrigin: window.origin
        }
    },
    methods: {
        addToCompare(productId) {
            this.addToCompareForGuest(productId);
        },
        addToCompareForGuest(productId) {
            let compareItems = JSON.parse(localStorage.getItem('compare_items') || '[]');
            if (compareItems.length >= 4) {
                this.emitFlashMessage('warning',
                    "Vous ne pouvez pas comparer plus de 4 logiciels.");
                this.showComparator(compareItems.length);
                return;
            }
            if (compareItems.includes(productId)) {
                this.emitFlashMessage('warning', "Le logiciel est déjà ajouté à la liste de comparaison.");
                return;
            }
            this.$axios.post(this.windowOrigin + "/api/compare-items/products-comparee-new", {
                product_ids: [...compareItems, productId] // include the new product in the request
            })
                .then(response => {
                    const products = response.data.data;

                    // Extract categories from the products
                    const categories = products.map(product => product.categories[0]);
                    // Check if all products belong to the same category
                    const uniqueCategories = [...new Set(categories)];
                    if (uniqueCategories.length > 1) {
                        this.renderComparatorContent(response.data.data);
                        this.showComparator(compareItems.length);
                        this.emitFlashMessage('warning',
                            "Vous ne pouvez pas comparer des logiciels de catégories différentes.");
                        return;
                    }
                    compareItems.push(productId);
                    localStorage.setItem('compare_items', JSON.stringify(compareItems));
                    this.emitFlashMessage('success', "Logiciel ajouté avec succès à la liste de comparaison.");
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
        createComparatorItem(product) {
            const item = document.createElement('div');
            item.className = 'comparator-item';
            item.innerHTML = `
<img src="${product.socites && product.socites.logo ? product.socites.logo : "themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"}" alt="${product.name}">
<div class="comparator-item-details">
    <div class="comparator-item-title">${product.name}</div>
    <div class="comparator-item-description">${product.description}</div>
</div>
`;
            return item;
        },
        showComparator(count) {
            const modal = document.getElementById('modal-compar');
            const countElement = document.getElementById('count-comparator');
            modal.style.display = 'block';
            countElement.innerHTML = ` (${count}/4)`;
        },
        emitFlashMessage(type, message) {
            this.$emitter.emit('add-flash', {
                type,
                message
            });
        },
    },
};
