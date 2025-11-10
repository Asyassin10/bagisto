// Constants
const API_BASE_URL = document.querySelector('meta[name="api-base-url"]').getAttribute('content');
const BASE_DOMAIN = API_BASE_URL.replace('/api', '');
const DEFAULT_IMAGE = '/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp';
const LOCAL_STORAGE_KEY = 'compare_items';
const MAX_COMPARISON_ITEMS = 4;

// Store loaded products and filters
let allProducts = [];
let allFilters = [];
let currentModalId = '';

document.addEventListener('DOMContentLoaded', () => {
    initModal();
    updateComparisonCount();
});

function initModal() {
    const toggleButton = document.querySelector('button.span-link');
    if (!toggleButton) return;

    toggleButton.addEventListener('click', () => {
        updateComparisonCount();
        const modalContainer = document.querySelector('[data-container]');
        currentModalId = modalContainer ? modalContainer.getAttribute('data-container') : '';
        setTimeout(() => loadComparisonProducts(currentModalId), 300);
    });
}

function updateComparisonCount() {
    const compareItems = getComparisonItems();
    const countElement = document.getElementById('comparison-count');

    if (countElement) {
        countElement.textContent = `${compareItems.length}/${MAX_COMPARISON_ITEMS} produits sélectionnés`;
        countElement.className = compareItems.length >= MAX_COMPARISON_ITEMS
            ? 'text-sm text-red-500 font-medium'
            : 'text-sm text-black';
    }
}

async function loadComparisonProducts(modalid = '') {
    currentModalId = modalid;
    const containerSelector = modalid ? `.dynamic-product-container-${modalid}` : '.dynamic-product-container';
    const container = document.querySelector(containerSelector);
    const filterSidebarSelector = modalid ? `.filter-sidebar-${modalid}` : '.filter-sidebar';

    if (!container) return;

    showLoadingState(container);

    try {
        const compareItems = getComparisonItems();
        const productId = compareItems[0] || null;

        if (!productId) {
            showEmptyState(container, "Aucun produit à comparer. Ajoutez d'abord un produit à la comparaison.");
            return;
        }

        const selectedFilters = getSelectedFilters();
        const response = await fetchComparisonProducts(productId, selectedFilters);
        allProducts = response.products || [];
        allFilters = response.filters || [];

        if (allProducts.length === 0) {
            showEmptyState(container, "Aucun produit à afficher");
            return;
        }

        renderFilterSidebar(filterSidebarSelector, allFilters);
        renderProductCards(container, allProducts, compareItems, modalid);

    } catch (error) {
        showErrorState(container, error);
    }
}

function renderFilterSidebar(selector, filters) {
    const sidebar = document.querySelector(selector);
    if (!sidebar) return;

    if (!filters || filters.length === 0) {
        sidebar.innerHTML = '<p class="text-sm text-gray-500">Aucun filtre disponible</p>';
        return;
    }

    const filtersHtml = filters.map(filter => {
        const ouiOption = filter.options ? filter.options.find(opt => opt.name.toLowerCase() === 'oui') : null;
        if (!ouiOption) return '';

        return `
            <div class="mb-4">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox"
                           class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out filter-checkbox"
                           data-filter-code="${filter.code}"
                           data-option-id="${ouiOption.id}"
                           ${isFilterChecked(filter.code, ouiOption.id) ? 'checked' : ''}>
                    <span style="margin-left: 5px;" class="text-gray-700 text-xs">${filter.name}</span>
                </label>
            </div>
        `;
    }).filter(html => html !== '').join('');

    sidebar.innerHTML = `
        <div class="mb-4">
            <h3 class="text-lg font-semibold mb-3">Filtres</h3>
            ${filtersHtml}
        </div>
    `;

    // Add event listeners to checkboxes
    sidebar.querySelectorAll('.filter-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            applyFilters(currentModalId);
        });
    });
}

function isFilterChecked(filterCode, optionId) {
    const selectedFilters = getSelectedFilters();
    return selectedFilters[filterCode] === optionId;
}

function getSelectedFilters() {
    const selectedFilters = {};
    document.querySelectorAll('.filter-checkbox:checked').forEach(checkbox => {
        const filterCode = checkbox.getAttribute('data-filter-code');
        const optionId = checkbox.getAttribute('data-option-id');
        if (filterCode && optionId) {
            selectedFilters[filterCode] = optionId;
        }
    });
    return selectedFilters;
}

async function applyFilters(modalid = '') {
    const containerSelector = modalid ? `.dynamic-product-container-${modalid}` : '.dynamic-product-container';
    const container = document.querySelector(containerSelector);

    if (!container) return;

    showLoadingState(container);

    try {
        const compareItems = getComparisonItems();
        const productId = compareItems[0] || null;

        if (!productId) {
            showEmptyState(container, "Aucun produit à comparer. Ajoutez d'abord un produit à la comparaison.");
            return;
        }

        const selectedFilters = getSelectedFilters();
        const response = await fetchComparisonProducts(productId, selectedFilters);
        const filteredProducts = response.products || [];

        if (filteredProducts.length === 0) {
            showEmptyState(container, "Aucun produit trouvé avec ces filtres");
        } else {
            allProducts = filteredProducts;
            renderProductCards(container, filteredProducts, compareItems, modalid);
        }
    } catch (error) {
        showErrorState(container, error);
    }
}

function filterProducts(searchTerm) {
    const inputElement = document.getElementById('product-search-input');
    const modalContainer = inputElement.closest('[data-container]');
    const modalid = modalContainer ? modalContainer.getAttribute('data-container') : '';
    const containerSelector = modalid ? `.dynamic-product-container-${modalid}` : '.dynamic-product-container';
    const container = document.querySelector(containerSelector);

    const compareItems = getComparisonItems();

    if (!container || !allProducts.length) return;

    if (!searchTerm || searchTerm.trim() === '') {
        renderProductCards(container, allProducts, compareItems, modalid);
        return;
    }

    const filteredProducts = allProducts.filter(product =>
        product.name.toLowerCase().includes(searchTerm.toLowerCase())
    );

    if (filteredProducts.length === 0) {
        showEmptyState(container, "Aucun produit trouvé");
    } else {
        renderProductCards(container, filteredProducts, compareItems, modalid);
    }
}

function getComparisonItems() {
    try {
        return JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY) || "[]");
    } catch (error) {
        return [];
    }
}

function showLoadingState(container) {
    container.innerHTML = `
        <div class="w-full text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-blue-500 mb-2"></div>
            <p class="text-black">Chargement des produits...</p>
        </div>
    `;
}

function showEmptyState(container, message) {
    container.innerHTML = `
        <div class="w-full text-center py-8">
            <p class="text-black">${message}</p>
        </div>
    `;
}

function showErrorState(container, error) {
    container.innerHTML = `
        <div class="w-full text-center py-8">
            <p class="text-red-500">Erreur lors du chargement: ${error.message}</p>
        </div>
    `;
}

async function fetchComparisonProducts(productId, selectedFilters = {}) {
    let url = `${API_BASE_URL}/compare-items/products-no-compare?product_id=${productId}`;
    
    Object.keys(selectedFilters).forEach(filterCode => {
        const filterValue = selectedFilters[filterCode];
        url += `&${filterCode}=${encodeURIComponent(filterValue)}`;
    });

    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        }
    });

    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }

    const result = await response.json();

    if (!result?.products || !Array.isArray(result.products)) {
        throw new Error("Invalid data structure received from API");
    }

    return result;
}

function renderProductCards(container, products, compareItems, modalid = '', page = 1) {
    const perPage = 6;
    const totalPages = Math.ceil(products.length / perPage);
    const start = (page - 1) * perPage;
    const paginated = products.slice(start, start + perPage);

    const cardsHtml = paginated.map(product => createProductCard(product, compareItems)).join("");
    const paginationHtml = generatePaginationControls(products, compareItems, page, totalPages, modalid);

    container.innerHTML = `
        <div class="grid grid-cols-2 gap-4 mt-4">
            ${cardsHtml}
        </div>
        ${paginationHtml}
    `;
}

function generatePaginationControls(products, compareItems, currentPage, totalPages, modalid = '') {
    if (totalPages <= 1) return "";

    let buttons = '';
    for (let i = 1; i <= totalPages; i++) {
        buttons += `
            <button
                onclick="renderProductCards(document.querySelector('.dynamic-product-container-${modalid}'), allProducts, getComparisonItems(), '${modalid}', ${i})"
                class="px-3 py-1 rounded-full mx-1 ${i === currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 text-black hover:bg-gray-300'}"
            >
                ${i}
            </button>
        `;
    }

    return `
        <div class="flex justify-center items-center mt-6 space-x-1">
            ${buttons}
        </div>
    `;
}

function createProductCard(product, compareItems) {
    let imageUrl = DEFAULT_IMAGE;

     if (product?.societe?.logo) {
        imageUrl = `${BASE_DOMAIN}/${product.societe.logo}`;
    }
 

    const productName = product.name || 'Produit sans nom';
    const productId = product.id;
    const isAlreadySelected = compareItems.includes(productId);
    const isMaxReached = compareItems.length >= MAX_COMPARISON_ITEMS;

    let buttonText, buttonClass, buttonStyle, isDisabled, clickAction;

    if (isAlreadySelected) {
        buttonText = "Déjà sélectionné";
        buttonClass = "bg-gray-500 text-white border-none px-4 py-2 rounded-full mt-2 btn-card mx-4 my-2 btn-voici w-auto";
        buttonStyle = "background-color: #6B7280;color:white;border:none;cursor:not-allowed;";
        isDisabled = true;
        clickAction = "";
    } else if (isMaxReached) {
        buttonText = "Limite atteinte";
        buttonClass = "bg-red-500 text-white border-none px-4 py-2 rounded-full mt-2 btn-card mx-4 my-2 btn-voici w-auto";
        buttonStyle = "background-color: #DC2626;color:white;border:none;cursor:not-allowed;";
        isDisabled = true;
        clickAction = "";
    } else {
        buttonText = "Comparer";
        buttonClass = "bg-green-600 text-white border-none px-4 py-2 rounded-full cursor-pointer mt-2 btn-card mx-4 my-2 btn-voici w-auto";
        buttonStyle = "background-color: #27986F;color:white;border:none;";
        isDisabled = false;
        clickAction = `addToComparison(${productId})`;
    }

    return `
        <div class="bg-white rounded-xl p-4 shadow-md flex flex-col items-center text-center">
            <img src="${imageUrl}"
                alt="${productName}"
                class="w-[60px] h-[60px] object-contain mb-2.5"
               >
            <h3 class="font-bold text-[1.1rem] text-black mb-2 line-clamp-2">${productName}</h3>
            <button
                class="${buttonClass}"
                style="${buttonStyle}"
                data-product-id="${productId}"
                ${isDisabled ? 'disabled' : ''}
                ${clickAction ? `onclick="${clickAction}"` : ''}>
                ${buttonText}
            </button>
            ${isAlreadySelected ? '<p class="text-xs text-black mt-1">✓ Ajouté à la comparaison</p>' : ''}
        </div>
    `;
}

function addToComparison(productId) {
    try {
        let compareItems = getComparisonItems();

        if (compareItems.includes(productId)) return;
        if (compareItems.length >= MAX_COMPARISON_ITEMS) {
            alert(`Vous ne pouvez comparer que ${MAX_COMPARISON_ITEMS} produits maximum.`);
            return;
        }

        compareItems.push(productId);
        localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(compareItems));

        updateButtonState(productId);
        updateComparisonCount();

        if (compareItems.length >= MAX_COMPARISON_ITEMS) {
            disableAllAvailableButtons();
        }
    } catch (error) {
        console.error(error);
    }
}

function updateButtonState(productId) {
    const button = document.querySelector(`button[data-product-id="${productId}"]`);
    if (!button) return;

    button.textContent = "Déjà sélectionné";
    button.className = "bg-gray-500 text-white border-none px-4 py-2 rounded-full mt-2 btn-card mx-4 my-2 btn-voici w-auto";
    button.style = "background-color: #6B7280;color:white;border:none;cursor:not-allowed;";
    button.disabled = true;
    button.removeAttribute('onclick');

    const parentDiv = button.parentElement;
    const checkmark = document.createElement('p');
    checkmark.className = 'text-xs text-black mt-1';
    checkmark.textContent = '✓ Ajouté à la comparaison';
    parentDiv.appendChild(checkmark);
}

function disableAllAvailableButtons() {
    const availableButtons = document.querySelectorAll('button[data-product-id]:not([disabled])');
    availableButtons.forEach(button => {
        if (button.textContent === "Comparer") {
            button.textContent = "Limite atteinte";
            button.className = "bg-red-500 text-white border-none px-4 py-2 rounded-full mt-2 btn-card mx-4 my-2 btn-voici w-auto";
            button.style = "background-color: #DC2626;color:white;border:none;cursor:not-allowed;";
            button.disabled = true;
            button.removeAttribute('onclick');
        }
    });
}

function closeModalAndRefresh() {
    const modal = document.querySelector('[data-modal]');
    if (modal) modal.style.display = 'none';
    setTimeout(() => window.location.reload(), 100);
}

function closeModal() {
    closeModalAndRefresh();
}