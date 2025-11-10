const { mount } = require('@vue/test-utils');
const vCompare = require('./v-compare').default; // Adjust the path



// Mock global dependencies
global.window = {
    origin: 'http://127.0.0.1:8000',
    print: jest.fn(), // Mock window.print
};



const localStorageMock = {

    getItem: jest.fn(),
    setItem: jest.fn(),
    removeItem: jest.fn(),
};

// Replace global.localStorage with the mock
//global.localStorage = localStorageMock;
Object.defineProperty(window, 'localStorage', { value: localStorageMock });

// Mock axios
global.axios = {
    get: jest.fn(() => Promise.resolve({ data: { data: [] } })),
    post: jest.fn(() => Promise.resolve({ data: { message: 'Success' } })),
};

// Mock $emitter
global.$emitter = {
    emit: jest.fn(),
};

describe('v-compare Component', () => {
    let wrapper;

    beforeEach(async () => {
        localStorageMock.getItem.mockClear();
        // Inject the template into the DOM
        document.body.innerHTML = `
      <script type="text/x-template" id="v-compare-template">
        <div>
          <div id="div_print"></div>
        </div>
      </script>
    `;

        // Mount the component
        wrapper = mount(vCompare, {
            global: {
                mocks: {
                    $axios: global.axios,
                    $emitter: global.$emitter,
                },
            },
        });

        // Wait for the component to fully mount
        await wrapper.vm.$nextTick();
    });

    afterEach(() => {
        wrapper.unmount();
        document.body.innerHTML = ''; // Clean up the DOM
    });

    test('JSON parsing returns empty array when localStorage is empty', () => {
        localStorageMock.getItem.mockReturnValue(null);
        const productIds = JSON.parse(localStorage.getItem('compare_items') || '[]');

        expect(productIds).toEqual([]);
        expect(localStorageMock.getItem).toHaveBeenCalledWith('compare_items');
    });

    it('removes an item', async () => {
        await wrapper.vm.remove(1);
        expect(global.$emitter.emit).toHaveBeenCalledWith('open-confirm-modal', {
            agree: expect.any(Function),
        });
    });
    it('removes all items', async () => {
        await wrapper.vm.removeAll();
        expect(global.$emitter.emit).toHaveBeenCalledWith('open-confirm-modal', {
            agree: expect.any(Function),
        });
    });
    it('initializes with default data', () => {
        expect(wrapper.vm.comparableAttributes).toEqual([{ code: 'product', name: 'Product' }]);
    });
    it('removes all items and redirects the user', async () => {
        // Mock the confirm modal agree callback
        // const agreeCallback = jest.fn();
        global.$emitter.emit.mockImplementation((event, payload) => {
            if (event === 'open-confirm-modal') {

                payload.agree();
            }
        });

        /*  global.$emitter.emit = jest.fn((event, payload) => {
             if (event === 'open-confirm-modal') {
                 openConfirmModalMock(payload); // Store the payload for later assertion
             } else if (event === 'add-flash') {
                 // Handle add-flash event if necessary
             }
         }); */
        // Call removeAll
        await wrapper.vm.removeAll();
        // Verify localStorage is cleared
        //   expect(localStorageMock.removeItem).toHaveBeenCalledWith('compare_items');

        // Verify items array is emptied
        expect(wrapper.vm.items).toEqual([]);

        // Verify flash message is emitted
        expect(global.$emitter.emit).toHaveBeenCalledWith('add-flash', {
            type: 'success',
            message: "Tous les articles ont été supprimés avec succès.",
        });

        // Verify redirection
        expect(window.location.href).toBe('http://localhost/');
    });
    it('removes a product by id', async () => {
        // Mock the items in the component and local storage
        wrapper.vm.items = [{ id: 1 }, { id: 2 }, { id: 3 }];
        localStorageMock.getItem.mockReturnValue(JSON.stringify([1, 2, 3]));

        // Call the remove method
        await wrapper.vm.remove(2);

        // Confirm modal is emitted
        expect(global.$emitter.emit).toHaveBeenCalledWith('open-confirm-modal', {
            agree: expect.any(Function),
        });

        // Simulate confirmation
        const agreeFn = global.$emitter.emit.mock.calls[0][1].agree;
        agreeFn();

        // Verify that the item is removed from items array
        expect(wrapper.vm.items).toEqual([{ id: 1 }, { id: 3 }]);




    });

    it('sets thematique_attributes when response.data.data.thematique exists', async () => {
        // Prepare mock data with thematique
        const mockResponse = {
            data: {
                data: {
                    thematique: ['Theme1', 'Theme2']
                }
            }
        };

        // Mock the axios get method to return the mock data
        global.axios.get.mockResolvedValue(mockResponse);

        // Call getAttributes method
        await wrapper.vm.getAttributes();

        // Assert that thematique_attributes is set correctly
        expect(wrapper.vm.thematique_attributes).toEqual(['Theme1', 'Theme2']);
    });

    it('sets usage_attributes when response.data.data.usage exists', async () => {
        // Prepare mock data with usage
        const mockResponse = {
            data: {
                data: {
                    usage: ['Usage1', 'Usage2']
                }
            }
        };

        // Mock the axios get method to return the mock data
        global.axios.get.mockResolvedValue(mockResponse);

        // Call getAttributes method
        await wrapper.vm.getAttributes();

        // Assert that usage_attributes is set correctly
        expect(wrapper.vm.usage_attributes).toEqual(['Usage1', 'Usage2']);
    });



    it('filters out the productId from localStorage compare_items', async () => {
        // Mock localStorage.getItem to return a predefined array of product IDs
        const initialProductIds = [1, 2, 3];
        localStorageMock.getItem.mockReturnValue(JSON.stringify(initialProductIds));

        // Mock the items in the component
        wrapper.vm.items = [
            { id: 1, name: 'Product 1' },
            { id: 2, name: 'Product 2' },
            { id: 3, name: 'Product 3' },
        ];

        // Call the remove method with productId = 2
        await wrapper.vm.remove(2);

        // Simulate the confirmation by calling the agree function
        const agreeFn = global.$emitter.emit.mock.calls[0][1].agree;
        agreeFn();

        // Verify that localStorage.getItem was called correctly
        expect(localStorageMock.getItem).toHaveBeenCalledWith('compare_items');

        // Verify that the productId (2) was filtered out from the array
        const updatedProductIds = JSON.parse(localStorageMock.setItem.mock.calls[0][1]);
        expect(updatedProductIds).toEqual([1, 3]);

        // Verify that localStorage.setItem was called with the updated array
        expect(localStorageMock.setItem).toHaveBeenCalledWith(
            'compare_items',
            JSON.stringify([1, 3])
        );
    });
});
