export default {
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
            isLoading: true,
            windowOrigin: window.origin
        };
    },
    mounted() {
        this.getItems();
    },
    unmounted() {
    },
    methods: {
        getItems() {
            let productIds = JSON.parse(localStorage.getItem('compare_items') || '[]');
            this.$axios.get(this.windowOrigin + "/api/compare-items", {
                params: {
                    product_ids: productIds,
                },
            })
                .then(response => {
                    this.items = response.data.data;
                    this.getAttributes();
                })
                .catch(error => { });
        },
        getAttributes() {
            let productIds = JSON.parse(localStorage.getItem('compare_items') || '[]');
            this.$axios.get(this.windowOrigin + "/api/compare-items/getComparableAttributes", {
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
                .catch(error => { });
        },
        remove(productId) {
            this.$emitter.emit('open-confirm-modal', {
                agree: () => {
                    const index = this.items.findIndex((item) => item.id === productId);
                    this.items.splice(index, 1);
                    let items = JSON.parse(localStorage.getItem('compare_items') || '[]')
                        .filter(item => item != productId);
                    localStorage.setItem('compare_items', JSON.stringify(items));
                }
            });
        },
        removeAll() {
            this.$emitter.emit('open-confirm-modal', {
                agree: () => {
                    localStorage.removeItem('compare_items');
                    this.items = [];
                    this.$emitter.emit('add-flash', {
                        type: 'success',
                        message: "Tous les articles ont été supprimés avec succès."
                    });
                    window.location.href = '/';
                }
            });
        },
    }
};
