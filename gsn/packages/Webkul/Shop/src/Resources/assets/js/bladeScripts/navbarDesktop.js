// resources/js/categoryMenu.js

const currentDomain = window.location.origin; // e.g., "https://example.com"

let final_link = currentDomain;
if (currentDomain.includes("localhost")) final_link = "http://127.0.0.1:8000"
const apiUrl = `${final_link}/api/categories/tree`;

//const apiUrl = `http://127.0.0.1:8000/api/categories/tree`;

const categoryOrder = [
    'Comptabilité - Précomptabilité',
    'Social - RH',
    'Juridique - Fiscal',
    'Signature électronique - Télétransmission - Archivage',
    'Data',
    'Gestion interne & Commerciale',
    'PDP',
    'Gestion de trésorerie - Financement',
    'Durabilité',
    'Gestion patrimoine',
    'Autres solutions numériques'
];

export function initializeCategoryMenu() {

    document.addEventListener('DOMContentLoaded', function () {
        console.log("apiUrl")
        console.log(apiUrl)
        console.log("apiUrl")
        // Fetch data from the API
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const menu = document.getElementById('category-menu');
                const menuWeb = document.getElementById('category-menu-web');
                menu.innerHTML = '';
                menuWeb.innerHTML = '';

                if (data.data.length === 0) {
                    const li = document.createElement('li');
                    li.classList.add('text-center');
                    li.style.fontFamily = 'Urbanist, sans-serif';
                    li.style.fontSize = '1rem';
                    li.style.fontWeight = '600';
                    li.textContent = 'Aucune catégorie disponible.';
                    menu.appendChild(li);
                    menuWeb.appendChild(li.cloneNode(true));
                    return;
                }
                    const sortedCategories = categoryOrder
                    .map(name => data.data.find(category => category.name === name))
                    .filter(Boolean); // remove undefined in case some are not found

                // Iterate over categories and create dropdown items
                sortedCategories.forEach(category => {
                    // Format category name
                    const formattedName = category.name;

                    // Create a list item for mobile
                    const liMobile = document.createElement('li');
                    liMobile.classList.add('bg-white', 'hover:bg-gray-100', 'p-2', 'rounded-lg',
                        'transition-colors', 'duration-200');
                    liMobile.style.fontFamily = 'Urbanist, sans-serif';
                    liMobile.style.fontSize = '1rem';
                    liMobile.style.fontWeight = '600';

                    // Create a link element for mobile
                    const linkMobile = document.createElement('a');
                    linkMobile.href = category.url;
                    linkMobile.textContent = formattedName;
                    linkMobile.classList.add('text-black', 'block', 'px-4', 'text-base',
                        'font-semibold', 'no-underline');

                    // Add the link to the list item and append to mobile menu
                    liMobile.appendChild(linkMobile);
                    menu.appendChild(liMobile);

                    // Create a similar list item for web
                    const liWeb = liMobile.cloneNode(true);
                    menuWeb.appendChild(liWeb);
                });
            })
            .catch(error => {
                console.error('Error fetching categories:', error);
                console.log("error")
                console.log(error)
                console.log("error")

                const menu = document.getElementById('category-menu');
                const menuWeb = document.getElementById('category-menu-web');
                menu.innerHTML = '';
                menuWeb.innerHTML = '';

                const li = document.createElement('li');
                li.classList.add('text-center', 'py-2');
                li.style.fontFamily = 'Urbanist, sans-serif';
                li.style.fontSize = '1rem';
                li.style.fontWeight = '600';
                li.textContent = 'Erreur lors du chargement des catégories.';
                menu.appendChild(li);
                menuWeb.appendChild(li.cloneNode(true));
            });
    });
}
/*
















*/
