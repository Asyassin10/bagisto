// categoryMenu.test.js
const { initializeCategoryMenu } = require('./navbarDesktop');

describe('initializeCategoryMenu', () => {
    let mockMenu;
    let mockMenuWeb;

    beforeEach(() => {
        global.fetch = require('jest-fetch-mock');
        // Mock the DOM elements
        mockMenu = document.createElement('div');
        mockMenu.id = 'category-menu';
        document.body.appendChild(mockMenu);

        mockMenuWeb = document.createElement('div');
        mockMenuWeb.id = 'category-menu-web';
        document.body.appendChild(mockMenuWeb);

        // Reset fetch mock before each test
        fetch.resetMocks();
    });

    afterEach(() => {
        // Clean up the DOM
        document.body.removeChild(mockMenu);
        document.body.removeChild(mockMenuWeb);
    });

    /*   it('should handle empty data', async () => {
          // Mock fetch to return empty data
          fetch.mockResponseOnce(JSON.stringify({ data: [] }));

          initializeCategoryMenu();

          // Trigger window.onload
          window.dispatchEvent(new Event('load'));

          // Wait for promises to resolve
          await new Promise((resolve) => setTimeout(resolve, 0));

          // Check if the menu displays the "no categories" message
          expect(mockMenu.innerHTML).toContain('<li class=\"text-center py-2\" style=\"font-family: Urbanist, sans-serif; font-size: 1rem; font-weight: 600;\">Erreur lors du chargement des catégories.</li>');
          expect(mockMenuWeb.innerHTML).toContain('<li class=\"text-center py-2\" style=\"font-family: Urbanist, sans-serif; font-size: 1rem; font-weight: 600;\">Erreur lors du chargement des catégories.</li>');
      }); */
    it('should handle empty data', async () => {
        // Mock fetch to return empty data
        global.fetch.mockResolvedValueOnce({
            json: async () => ({ data: [] })
        });

        // Initialize the menu
        initializeCategoryMenu();

        // Trigger DOMContentLoaded event
        document.dispatchEvent(new Event('DOMContentLoaded'));

        // Wait for promises to resolve
        await new Promise(process.nextTick);

        // Check if the menu displays the "no categories" message
        expect(mockMenu.innerHTML).toContain('Aucune catégorie disponible');
        expect(mockMenuWeb.innerHTML).toContain('Aucune catégorie disponible');
    });


    /*  it('should format category names correctly', async () => {
         // Mock fetch to return sample data
         global.fetch.mockResolvedValueOnce({
             json: async () => ({
                 data: [
                     { name: 'test-category', url: '/test-category' },
                     { name: 'another,category', url: '/another-category' }
                 ]
             })
         });

         // Initialize the menu
         initializeCategoryMenu();

         // Trigger DOMContentLoaded event
         document.dispatchEvent(new Event('DOMContentLoaded'));

         // Use a more robust waiting approach
         await new Promise(process.nextTick);


         // Debug what's actually in the DOM
         console.log("mockMenu HTML:", mockMenu.innerHTML);

         // Find list items
         const listItems = mockMenu.querySelectorAll('li');
         console.log("Number of list items:", listItems.length);

         // Check the first category
         if (listItems.length > 0) {
             // Log the structure of the first list item
             console.log("First list item HTML:", listItems[0].outerHTML);
             console.log("First list item content:", listItems[0].textContent);

             // Check if the link exists
             const firstLink = listItems[0].querySelector('a');
             if (firstLink) {
                 expect(firstLink.textContent).toBe('test-category');
             } else {
                 // If no link, check if the text is directly in the list item
                 expect(listItems[0].textContent.trim()).toBe('test-category');
             }
         }

         // For the test to pass for now
         expect(true).toBe(true);
     }); */

    it('should format category names correctly', async () => {
        // Mock fetch to return sample data
        global.fetch = jest.fn().mockResolvedValue({
            json: () => Promise.resolve({
                data: [
                    { name: 'test-category', url: '/test-category' },
                    { name: 'another,category', url: '/another-category' }
                ]
            })
        });

        // Initialize the menu
        initializeCategoryMenu();

        // Trigger DOMContentLoaded event
        document.dispatchEvent(new Event('DOMContentLoaded'));

        // Wait for promises to resolve completely
        await new Promise(resolve => setTimeout(resolve, 100));

        // Check the first category
        const firstItem = mockMenu.querySelector('li');
        const firstLink = firstItem.querySelector('a');
        expect(firstLink.textContent).toBe('test-category');

        // Check the second category (optional validation)
        const secondItem = mockMenu.querySelectorAll('li')[1];
        const secondLink = secondItem.querySelector('a');
        expect(secondLink.textContent).toBe('another,category');

        // Check the web menu too
        const firstWebItem = mockMenuWeb.querySelector('li a');
        expect(firstWebItem.textContent).toBe('test-category');
    });
    /* it('should handle fetch errors', async () => {
        // Mock fetch to reject with an error
        fetch.mockRejectOnce(new Error('Failed to fetch'));

        initializeCategoryMenu();

        // Trigger window.onload
        window.dispatchEvent(new Event('load'));

        // Wait for promises to resolve
        await new Promise((resolve) => setTimeout(resolve, 0));

        // Check if the error message is displayed
        expect(mockMenu.innerHTML).toContain('Erreur lors du chargement des catégories.');
        expect(mockMenuWeb.innerHTML).toContain('Erreur lors du chargement des catégories.');
    }); */
    it('should handle fetch errors', async () => {
        // Mock fetch to reject with an error
        global.fetch.mockRejectedValueOnce(new Error('Failed to fetch'));

        // Initialize the menu
        initializeCategoryMenu();

        // Trigger DOMContentLoaded event
        document.dispatchEvent(new Event('DOMContentLoaded'));

        // Wait for promises to resolve
        await new Promise(resolve => setTimeout(resolve, 100));

        // Check if the error message is displayed
        expect(mockMenu.innerHTML).toContain('Erreur lors du chargement des catégories');
        expect(mockMenuWeb.innerHTML).toContain('Erreur lors du chargement des catégories');
    });
});
