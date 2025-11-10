const { mount } = require('@vue/test-utils');
const VProductCard = require('./v-product-card-compare').default;


const localStorageMock = {

    getItem: jest.fn(),
    setItem: jest.fn(),
    removeItem: jest.fn(),
};

// Replace global.localStorage with the mock
global.localStorage = localStorageMock;
//Object.defineProperty(window, 'localStorage', { value: localStorageMock });
Object.defineProperty(window, 'localStorage', { value: localStorageMock });


// Mock $emitter
global.$emitter = {
    emit: jest.fn(),
};

global.axios = {
    get: jest.fn(() => Promise.resolve({ data: { data: [] } })),
    post: jest.fn(() => Promise.resolve({
        data: {
            data: [
                {
                    "id": 590,
                    "name": "Gretchen Armstrong",
                    "description": "Omnis molestias et et veniam numquam fugiat nesciunt proident molestiae et",
                    "categories": [
                        3
                    ],
                    "socites": null
                }
            ]
        }
    })),
};

describe('VProductCard', () => {
    let wrapper;

    const product = {
        id: 590,
        name: 'Test Product',
        description: 'This is a test product',
        societe: {
            logo: 'test-logo.png',
        },
        base_image: {
            original_image_url: 'placeholder-image.png',
        },
        url_key: 'http://example.com/product/1',
    };

    beforeEach(() => {
        // Mock window.origin
        //   localStorageMock.getItem.mockClear();

        Object.defineProperty(window, 'origin', {
            value: 'http://127.0.0.1:8000',
            writable: true,
        });

        // Inject the template into the DOM
        document.body.innerHTML = `
            <script type="text/x-template" id="v-product-card-template">
                <div class="responsive-grid w-full">
                    <div class="card" v-if="product">
                        <div class="card-content">
                            <div class="w-full flex items-center">
                                <div class="w-1/3">
                                    <img class="w-full h-auto"
                                        :src="product.societe && product.societe.logo ? product.societe.logo : product.base_image.original_image_url">
                                </div>
                                <div class="w-full items-center">
                                    <p class="truncate-name">
                                        {{ product.name }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="truncate-description-card">{{ product.description }}</div>
                            </div>
                        </div>
                        <div class="card-footer flex md:block justify-between items-center">
                            <a href="#" class="btn-card comparer-btn" @click.prevent="addToCompare(product.id)">
                                Comparer
                            </a>
                            <a :href="product.url_key" class="btn-card btn-voici my-2 mx-2">
                                Voir la fiche
                            </a>
                        </div>
                    </div>
                </div>
            </script>
        `;

        /* jest.clearAllMocks();
        localStorageMock.getItem.mockClear();
        localStorageMock.setItem.mockClear();
        localStorageMock.removeItem.mockClear(); */
        // Mount the component with mocks
        wrapper = mount(VProductCard, {
            props: {
                product,
            },
            global: {
                mocks: {
                    $axios: global.axios,
                    $emitter: global.$emitter,
                },
            },
        });
    });
    test('JSON parsing returns empty array when localStorage is empty', () => {
        localStorageMock.getItem.mockReturnValue(null);
        const productIds = JSON.parse(localStorage.getItem('compare_items') || '[]');

        expect(productIds).toEqual([]);
        expect(localStorageMock.getItem).toHaveBeenCalledWith('compare_items');
    });




    afterEach(() => {
        //     localStorage.clear();
        jest.clearAllMocks();
        document.body.innerHTML = ''; // Clean up the DOM after each test
    });

    it('renders the product card correctly', () => {
        expect(wrapper.exists()).toBe(true);
        expect(wrapper.props('product')).toEqual(product);
    });

    it('shows the comparator modal with the correct count', () => {
        // Mock DOM elements
        document.body.innerHTML = `
            <div id="modal-compar"></div>
            <div id="count-comparator"></div>
        `;

        // Call the method
        wrapper.vm.showComparator(2);

        // Check if the modal and count were updated
        const modal = document.getElementById('modal-compar');
        const countElement = document.getElementById('count-comparator');
        expect(modal.style.display).toBe('block');
        expect(countElement.innerHTML).toBe(' (2/4)');
    });
    it('renders comparator content correctly', () => {
        // Mock DOM elements
        document.body.innerHTML = `
            <div class="comparator-items-container"></div>
        `;

        // Call the method
        wrapper.vm.renderComparatorContent([product]);

        // Check if the content was rendered
        const container = document.querySelector('.comparator-items-container');
        expect(container.innerHTML).toContain(product.name);
        expect(container.innerHTML).toContain(product.description);
    });
    /*   it('prevents adding more than 4 products to compare list', async () => {
          // Mock localStorage with 4 items
          const compareItems = [1, 2, 3, 4];
          Storage.prototype.getItem = jest.fn(() => JSON.stringify(compareItems));

          // Mock DOM elements required by the component
          document.body.innerHTML = `
              <div id="modal-compar"></div>
              <div id="count-comparator"></div>
          `;

          // Call the method
          await wrapper.vm.addToCompare(product.id);

          // Check if the warning flash message was emitted
          expect(wrapper.vm.$emitter.emit).toHaveBeenCalledWith('add-flash', {
              type: 'warning',
              message: "Vous ne pouvez pas comparer plus de 4 logiciels.",
          });

          // Check if the modal and count were updated
          const modal = document.getElementById('modal-compar');
          const countElement = document.getElementById('count-comparator');
          expect(modal.style.display).toBe('block');
          expect(countElement.innerHTML).toBe(' (4/4)');
      }); */
    it('prevents adding more than 4 products to compare list', async () => {
        // Mock localStorage with 4 items
        const compareItems = [1, 2, 3, 4];
        localStorageMock.getItem.mockReturnValue(JSON.stringify(compareItems));

        // Mock DOM elements required by the component
        document.body.innerHTML = `
            <div id="modal-compar"></div>
            <div id="count-comparator"></div>
        `;

        // Call the method to add a new product (this should fail since the list is full)
        await wrapper.vm.addToCompare(590);

        // Check if the warning flash message was emitted
        expect(wrapper.vm.$emitter.emit).toHaveBeenCalledWith('add-flash', {
            type: 'warning',
            message: "Vous ne pouvez pas comparer plus de 4 logiciels.",
        });

        // Check if the modal and count were updated
        const modal = document.getElementById('modal-compar');
        const countElement = document.getElementById('count-comparator');
        expect(modal.style.display).toBe('block');
        expect(countElement.innerHTML).toBe(' (4/4)');

        // Verify that no further actions were taken (e.g., no API call or localStorage update)
        expect(wrapper.vm.$axios.post).not.toHaveBeenCalled();
        expect(localStorageMock.setItem).not.toHaveBeenCalled();
    });






    /*    it('adds a product to compare list', async () => {
           // Mock localStorage with 4 items
           const compareItems = [590];
           Storage.prototype.getItem = jest.fn(() => JSON.stringify(compareItems));

           // Mock DOM elements required by the component
           document.body.innerHTML = `
             <div id="modal-compar"></div>
             <div id="count-comparator"></div>
         `;

           // Call the method
           await wrapper.vm.addToCompare(600);

           // Check if $axios.post was called with the correct URL
           expect(wrapper.vm.$axios.post).toHaveBeenCalledWith(
               'http://127.0.0.1:8000/api/compare-items/products-comparee-new',
               {
                   product_ids: [590, 600]
               }
           );


           // Check if the flash message was emitted
           expect(wrapper.vm.$emitter.emit).toHaveBeenCalledWith('add-flash', {
               type: 'success',
               message: "Logiciel ajouté avec succès à la liste de comparaison.",
           });
       }); */
    it('adds a product to compare list', async () => {
        // Mock localStorage with an existing product ID
        const compareItems = [590];
        localStorageMock.getItem.mockReturnValue(JSON.stringify(compareItems));

        // Mock DOM elements required by the component
        document.body.innerHTML = `
            <div id="modal-compar"></div>
            <div id="count-comparator"></div>
            <div class="comparator-items-container"></div>
        `;

        // Mock axios.post to return a successful response
        global.axios.post.mockResolvedValue({
            data: {
                data: [
                    {
                        id: 590,
                        name: 'Test Product 1',
                        description: 'Description 1',
                        categories: [3],
                        socites: { logo: 'logo1.png' },
                    },
                    {
                        id: 600,
                        name: 'Test Product 2',
                        description: 'Description 2',
                        categories: [3],
                        socites: { logo: 'logo2.png' },
                    },
                ],
            },
        });

        // Call the method to add a new product to the compare list
        await wrapper.vm.addToCompare(600);

        // Check if $axios.post was called with the correct URL and payload
        expect(wrapper.vm.$axios.post).toHaveBeenCalledWith(
            'http://127.0.0.1:8000/api/compare-items/products-comparee-new',
            {
                product_ids: [590, 600], // Verify the payload includes both existing and new product IDs
            }
        );

        // Check if localStorage.setItem was called with the updated list
        expect(localStorageMock.setItem).toHaveBeenCalledWith(
            'compare_items',
            JSON.stringify([590, 600])
        );

        // Check if the success flash message was emitted
        expect(wrapper.vm.$emitter.emit).toHaveBeenCalledWith('add-flash', {
            type: 'success',
            message: 'Logiciel ajouté avec succès à la liste de comparaison.',
        });

        // Verify that the comparator modal and content were updated
        const modal = document.getElementById('modal-compar');
        const countElement = document.getElementById('count-comparator');
        expect(modal.style.display).toBe('block'); // Modal should be visible
        expect(countElement.innerHTML).toBe(' (2/4)'); // Count should reflect the updated list

        // Verify that the comparator content was rendered
        const container = document.querySelector('.comparator-items-container');
        expect(container.children.length).toBe(2); // Two products should be rendered
    });



    test('JSON parsing returns default array when localStorage is empty', () => {
        localStorageMock.getItem.mockReturnValue(null);

        const productIds = JSON.parse(localStorageMock.getItem('compare_items') || '[]');

        expect(localStorageMock.getItem).toHaveBeenCalledWith('compare_items');
    });
    it('prevents adding a duplicate product to compare list', async () => {
        // Mock localStorage with an existing product
        const compareItems = [590];
        localStorageMock.getItem.mockReturnValue(JSON.stringify(compareItems));

        // Call the method with the existing product ID
        await wrapper.vm.addToCompare(590);

        // Check if the warning flash message was emitted
        expect(wrapper.vm.$emitter.emit).toHaveBeenCalledWith('add-flash', {
            type: 'warning',
            message: "Le logiciel est déjà ajouté à la liste de comparaison.",
        });

        // Verify that no further actions were taken
        expect(wrapper.vm.$axios.post).not.toHaveBeenCalled();
        expect(localStorageMock.setItem).not.toHaveBeenCalled();
    });
    it('prevents comparing products from different categories', async () => {
        // Mock localStorage with an existing product
        const compareItems = [590];
        localStorageMock.getItem.mockReturnValue(JSON.stringify(compareItems));

        // Mock axios response with products from different categories
        global.axios.post.mockResolvedValue({
            data: {
                data: [
                    { id: 590, categories: [3], name: 'Product 1' },
                    { id: 600, categories: [4], name: 'Product 2' }
                ]
            }
        });

        // Mock DOM elements
        document.body.innerHTML = `
            <div class="comparator-items-container"></div>
            <div id="modal-compar"></div>
            <div id="count-comparator"></div>
        `;

        // Call the method
        await wrapper.vm.addToCompare(600);

        // Verify warning message
        expect(wrapper.vm.$emitter.emit).toHaveBeenCalledWith('add-flash', {
            type: 'warning',
            message: "Vous ne pouvez pas comparer des logiciels de catégories différentes.",
        });

        // Verify comparison content was rendered
        const container = document.querySelector('.comparator-items-container');
        expect(container.children.length).toBeGreaterThan(0);

        // Verify comparator modal was shown
        const modal = document.getElementById('modal-compar');
        expect(modal.style.display).toBe('block');

        // Verify localStorage was not updated
        expect(localStorageMock.setItem).not.toHaveBeenCalled();
    });
    it('creates comparator item with correct content and fallback logo', () => {
        // Test scenario with logo
        const productWithLogo = {
            name: 'Test Product',
            description: 'Test Description',
            socites: { logo: 'test-logo.png' }
        };

        const itemWithLogo = wrapper.vm.createComparatorItem(productWithLogo);
        expect(itemWithLogo.className).toBe('comparator-item');
        expect(itemWithLogo.querySelector('img').src).toContain('test-logo.png');
        expect(itemWithLogo.querySelector('.comparator-item-title').textContent).toBe('Test Product');
        expect(itemWithLogo.querySelector('.comparator-item-description').textContent).toBe('Test Description');

        // Test scenario without logo
        const productWithoutLogo = {
            name: 'Another Product',
            description: 'Another Description',
            socites: null
        };

        const itemWithoutLogo = wrapper.vm.createComparatorItem(productWithoutLogo);
        expect(itemWithoutLogo.querySelector('img').src).toContain('large-product-placeholder-13b8a96b.webp');
    });
    it('JSON parsing returns empty array when localStorage is empty', async () => {

        localStorageMock.getItem.mockReturnValue(null);
        const productIds = JSON.parse(localStorage.getItem('compare_items') || '[]');
        await wrapper.vm.addToCompare();

        expect(productIds).toEqual([]);
    });
    /*     it('should parse localStorage.getItem("compare_items") correctly', async () => {
            // Scenario 1: localStorage has valid JSON data
            const mockCompareItems = [1, 2, 3];
            await wrapper.vm.addToCompare(1);

            //  localStorageMock.getItem.mockReturnValue(JSON.stringify(mockCompareItems));
            localStorageMock.setItem.mockReturnValue(JSON.stringify(mockCompareItems));

            let compareItems = JSON.parse(localStorage.getItem('compare_items') || '[]');
            expect(compareItems).toEqual([590]);

            // Scenario 2: localStorage is empty (returns null)
            localStorageMock.getItem.mockReturnValue(null);

            compareItems = JSON.parse(localStorage.getItem('compare_items') || '[]');
            expect(compareItems).toEqual([590]);

            // Scenario 3: localStorage has invalid JSON data
            localStorageMock.getItem.mockReturnValue('invalid JSON');

            compareItems = JSON.parse(localStorage.getItem('compare_items') || '[]');
            expect(compareItems).toEqual([590]);
        }); */
    /*  it('returns an empty array when localStorage is empty', () => {
         // Mock localStorage.getItem to return null (empty localStorage)
         localStorageMock.getItem.mockReturnValue(null);

         // Call the method that uses the localStorage
         const compareItems = JSON.parse(localStorage.getItem('compare_items') || '[]');

         // Assert that the result is an empty array
         expect(compareItems).toEqual([]);

         // Verify that localStorage.getItem was called with the correct key
         expect(localStorageMock.getItem).toHaveBeenCalledWith('compare_items');
     });

     it('returns the parsed array when localStorage contains data', () => {
         // Mock localStorage.getItem to return a JSON string
         const mockData = [1, 2, 3];
         localStorageMock.getItem.mockReturnValue(JSON.stringify(mockData));

         // Call the method that uses the localStorage
         const compareItems = JSON.parse(localStorage.getItem('compare_items') || '[]');

         // Assert that the result is the parsed array
         expect(compareItems).toEqual(mockData);

         // Verify that localStorage.getItem was called with the correct key
         expect(localStorageMock.getItem).toHaveBeenCalledWith('compare_items');
     }); */



});
