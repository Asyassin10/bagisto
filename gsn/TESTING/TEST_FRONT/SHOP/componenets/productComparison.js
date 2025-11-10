// Constants
const API_BASE_URL = document.querySelector('meta[name="api-base-url"]').getAttribute('content');
const BASE_DOMAIN = API_BASE_URL.replace('/api', '');
const DEFAULT_IMAGE = '/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp';
const LOCAL_STORAGE_KEY = 'compare_items';
const MAX_COMPARISON_ITEMS = 4;

// Store loaded products for filtering
let allProducts = [];

document.addEventListener('DOMContentLoaded', () => {
    initModal();
    updateComparisonCount();
});

function initModal() {
    const toggleButton = document.querySelector('button.span-link');
    if (!toggleButton) return;

    toggleButton.addEventListener('click', () => {
        updateComparisonCount();
        setTimeout(loadComparisonProducts, 300);
    });
}

function updateComparisonCount() {
    const compareItems = getComparisonItems();
    const countElement = document.getElementById('comparison-count');

    if (countElement) {
        countElement.textContent = `${compareItems.length}/${MAX_COMPARISON_ITEMS} produits sélectionnés`;
        countElement.className = compareItems.length >= MAX_COMPARISON_ITEMS
            ? 'text-sm text-red-500 font-medium'
            : 'text-sm text-gray-500';
    }
}

async function loadComparisonProducts() {
    const container = document.getElementById("dynamic-product-container");
    if (!container) return;

    showLoadingState(container);

    try {
        const compareItems = getComparisonItems();
        const productId = compareItems[0] || null;

        if (!productId) {
            showEmptyState(container, "Aucun produit à comparer. Ajoutez d'abord un produit à la comparaison.");
            return;
        }

        const products = await fetchComparisonProducts(productId);
        allProducts = products;

        if (products.length === 0) {
            showEmptyState(container, "Aucun produit à afficher");
            return;
        }

        renderProductCards(container, products, compareItems);

    } catch (error) {
        showErrorState(container, error);
    }
}

function filterProducts(searchTerm) {
    const container = document.getElementById("dynamic-product-container");
    const compareItems = getComparisonItems();

    if (!container || !allProducts.length) return;

    if (!searchTerm || searchTerm.trim() === '') {
        renderProductCards(container, allProducts, compareItems);
        return;
    }

    const filteredProducts = allProducts.filter(product =>
        product.name.toLowerCase().includes(searchTerm.toLowerCase())
    );

    if (filteredProducts.length === 0) {
        showEmptyState(container, "Aucun produit trouvé");
    } else {
        renderProductCards(container, filteredProducts, compareItems);
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
            <p class="text-gray-500">Chargement des produits...</p>
        </div>
    `;
}

function showEmptyState(container, message) {
    container.innerHTML = `
        <div class="w-full text-center py-8">
            <p class="text-gray-500">${message}</p>
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

async function fetchComparisonProducts(productId) {
    const url = `${API_BASE_URL}/compare-items/products-no-compare?product_id=${productId}`;

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

    if (!result?.data || !Array.isArray(result.data)) {
        throw new Error("Invalid data structure received from API");
    }

    return result.data;
}

function renderProductCards(container, products, compareItems, page = 1) {
    const perPage = 6;
    const totalPages = Math.ceil(products.length / perPage);
    const start = (page - 1) * perPage;
    const paginated = products.slice(start, start + perPage);

    const cardsHtml = paginated.map(product => createProductCard(product, compareItems)).join("");
    const paginationHtml = generatePaginationControls(products, compareItems, page, totalPages);

    container.innerHTML = cardsHtml + paginationHtml;
}

function generatePaginationControls(products, compareItems, currentPage, totalPages) {
    if (totalPages <= 1) return "";

    let buttons = '';
    for (let i = 1; i <= totalPages; i++) {
        buttons += `
            <button
                onclick="renderProductCards(document.getElementById('dynamic-product-container'), allProducts, getComparisonItems(), ${i})"
                class="px-3 py-1 rounded-full mx-1 ${i === currentPage ? ' bg-gray-200 text-gray-700 ' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}"
            >
                ${i}
            </button>
        `;
    }

    return `
        <div class="flex justify-center items-center mt-6 space-x-1" style="margin-left: 150%;">
            ${buttons}
        </div>
    `;
}


function createProductCard(product, compareItems) {
    // Build the logo URL
    let imageUrl = DEFAULT_IMAGE;

    if (product?.societe?.logo) {
        const logoPath = product.societe.logo.startsWith('logos/')
            ? product.societe.logo.substring(6)
            : product.societe.logo;
        imageUrl = `${BASE_DOMAIN}/logos/${logoPath}`;
    }

    const productName = product.name || 'Produit sans nom';
    const truncatedName = productName.length > 25 ? productName.substring(0, 22) + '...' : productName;
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
                 onerror="this.src='${DEFAULT_IMAGE}'">
            <h3 class="font-bold text-[1.1rem] text-black mb-2 line-clamp-2" title="${productName}">${truncatedName}</h3>
            <button
                class="${buttonClass}"
                style="${buttonStyle}"
                data-product-id="${productId}"
                ${isDisabled ? 'disabled' : ''}
                ${clickAction ? `onclick="${clickAction}"` : ''}>
                ${buttonText}
            </button>
            ${isAlreadySelected ? '<p class="text-xs text-gray-500 mt-1">✓ Ajouté à la comparaison</p>' : ''}
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
    checkmark.className = 'text-xs text-gray-500 mt-1';
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
