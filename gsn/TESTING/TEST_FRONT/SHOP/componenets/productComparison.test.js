// Mock the DOM and localStorage before running tests
beforeEach(() => {
    document.body.innerHTML = `
    <meta name="api-base-url" content="http://127.0.0.1:8000/api">
    <button class="span-link"></button>
    <div id="comparison-count"></div>
    <div id="dynamic-product-container"></div>
  `;

    // Mock localStorage
    const localStorageMock = (() => {
        let store = {};
        return {
            getItem: jest.fn((key) => store[key] || null),
            setItem: jest.fn((key, value) => { store[key] = value.toString(); }),
            clear: jest.fn(() => { store = {}; }),
            removeItem: jest.fn((key) => { delete store[key]; }),
        };
    })();

    global.localStorage = localStorageMock;

    // Mock fetch
    global.fetch = jest.fn(() =>
        Promise.resolve({
            ok: true,
            json: () => Promise.resolve({ data: [] }),
        })
    );

    // Reset allProducts before each test
    allProducts = [];
});

afterEach(() => {
    jest.clearAllMocks();
});

describe('Product Comparison Functions', () => {
    describe('initModal', () => {
        it('should set up click event listener for toggle button', () => {
            const button = document.querySelector('button.span-link');
            const addEventListenerSpy = jest.spyOn(button, 'addEventListener');

            initModal();

            expect(addEventListenerSpy).toHaveBeenCalledWith('click', expect.any(Function));
        });
    });

    describe('updateComparisonCount', () => {
        it('should update count element with correct text and style when under limit', () => {
            localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify([1, 2]));
            updateComparisonCount();

            const countElement = document.getElementById('comparison-count');
            expect(countElement.textContent).toBe('2/4 produits sélectionnés');
            expect(countElement.className).toBe('text-sm text-gray-500');
        });

        it('should update count element with red text when at limit', () => {
            localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify([1, 2, 3, 4]));
            updateComparisonCount();

            const countElement = document.getElementById('comparison-count');
            expect(countElement.className).toBe('text-sm text-red-500 font-medium');
        });
    });

    describe('getComparisonItems', () => {
        it('should return empty array when localStorage is empty', () => {
            const result = getComparisonItems();
            expect(result).toEqual([]);
        });

        it('should return parsed array from localStorage', () => {
            localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify([1, 2, 3]));
            const result = getComparisonItems();
            expect(result).toEqual([1, 2, 3]);
        });

        it('should return empty array when localStorage has invalid JSON', () => {
            localStorage.setItem(LOCAL_STORAGE_KEY, 'invalid json');
            const result = getComparisonItems();
            expect(result).toEqual([]);
        });
    });

    describe('showLoadingState', () => {
        it('should display loading spinner and message', () => {
            const container = document.getElementById('dynamic-product-container');
            showLoadingState(container);

            expect(container.innerHTML).toContain('animate-spin');
            expect(container.innerHTML).toContain('Chargement des produits...');
        });
    });

    describe('showEmptyState', () => {
        it('should display the provided empty state message', () => {
            const container = document.getElementById('dynamic-product-container');
            showEmptyState(container, 'Test empty message');

            expect(container.innerHTML).toContain('Test empty message');
        });
    });

    describe('showErrorState', () => {
        it('should display the error message', () => {
            const container = document.getElementById('dynamic-product-container');
            const error = new Error('Test error');
            showErrorState(container, error);

            expect(container.innerHTML).toContain('Test error');
        });
    });

    describe('fetchComparisonProducts', () => {
        it('should fetch products from correct API endpoint', async () => {
            const mockResponse = { data: [{ id: 1, name: 'Product 1' }] };
            fetch.mockResolvedValueOnce({
                ok: true,
                json: () => Promise.resolve(mockResponse),
            });

            const result = await fetchComparisonProducts(1);
            expect(fetch).toHaveBeenCalledWith(
                'http://127.0.0.1:8000/api/compare-items/products-no-compare?product_id=1'
            );
            expect(result).toEqual(mockResponse.data);
        });

        it('should throw error when response is not ok', async () => {
            fetch.mockResolvedValueOnce({ ok: false, status: 404 });

            await expect(fetchComparisonProducts(1)).rejects.toThrow('HTTP error! status: 404');
        });

        it('should throw error when data structure is invalid', async () => {
            fetch.mockResolvedValueOnce({
                ok: true,
                json: () => Promise.resolve({}),
            });

            await expect(fetchComparisonProducts(1)).rejects.toThrow('Invalid data structure');
        });
    });

    describe('createProductCard', () => {
        const mockProduct = {
            id: 1,
            name: 'Test Product with a very long name that should be truncated',
            societe: {
                logo: 'logos/test-logo.png'
            }
        };

        it('should create card with truncated name (25 chars max)', () => {
            const compareItems = [];
            const cardHtml = createProductCard(mockProduct, compareItems);

            expect(cardHtml).toContain('Test Product with a very ...');
            expect(cardHtml).toContain('title="Test Product with a very long name that should be truncated"');
        });

        it('should show "Comparer" button when not selected', () => {
            const compareItems = [];
            const cardHtml = createProductCard(mockProduct, compareItems);

            expect(cardHtml).toContain('Comparer');
            expect(cardHtml).toContain('bg-green-600');
            expect(cardHtml).not.toContain('✓ Ajouté à la comparaison');
        });

        it('should show "Déjà sélectionné" when product is selected', () => {
            const compareItems = [1];
            const cardHtml = createProductCard(mockProduct, compareItems);

            expect(cardHtml).toContain('Déjà sélectionné');
            expect(cardHtml).toContain('✓ Ajouté à la comparaison');
            expect(cardHtml).toContain('bg-gray-500');
        });

        it('should show "Limite atteinte" when max items reached', () => {
            const compareItems = [2, 3, 4, 5];
            const cardHtml = createProductCard(mockProduct, compareItems);

            expect(cardHtml).toContain('Limite atteinte');
            expect(cardHtml).toContain('bg-red-500');
        });
    });

    describe('addToComparison', () => {
        it('should add product to comparison when under limit', () => {
            addToComparison(1);

            expect(localStorage.setItem).toHaveBeenCalledWith(
                LOCAL_STORAGE_KEY,
                JSON.stringify([1])
            );
        });

        it('should not add product if already in comparison', () => {
            localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify([1]));
            addToComparison(1);

            expect(localStorage.setItem).toHaveBeenCalledTimes(1); // Only the initial set
        });

        it('should not add product if max items reached', () => {
            localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify([1, 2, 3, 4]));
            const alertSpy = jest.spyOn(window, 'alert').mockImplementation(() => { });

            addToComparison(5);

            expect(alertSpy).toHaveBeenCalledWith('Vous ne pouvez comparer que 4 produits maximum.');
            expect(localStorage.setItem).toHaveBeenCalledTimes(1); // Only the initial set
        });
    });

    describe('filterProducts', () => {
        beforeEach(() => {
            allProducts = [
                { id: 1, name: 'Product A' },
                { id: 2, name: 'Product B' },
                { id: 3, name: 'Another Product' }
            ];
        });

        it('should show all products when search term is empty', () => {
            const container = document.getElementById('dynamic-product-container');
            const renderSpy = jest.spyOn(container, 'innerHTML', 'set');

            filterProducts('');

            expect(renderSpy).toHaveBeenCalled();
            expect(container.innerHTML).not.toContain('Aucun produit trouvé');
        });

        it('should filter products by search term', () => {
            const container = document.getElementById('dynamic-product-container');

            filterProducts('product');

            expect(container.innerHTML).toContain('Product A');
            expect(container.innerHTML).toContain('Product B');
            expect(container.innerHTML).not.toContain('Another Product');
        });

        it('should show empty state when no matches found', () => {
            const container = document.getElementById('dynamic-product-container');

            filterProducts('xyz');

            expect(container.innerHTML).toContain('Aucun produit trouvé');
        });
    });
});
