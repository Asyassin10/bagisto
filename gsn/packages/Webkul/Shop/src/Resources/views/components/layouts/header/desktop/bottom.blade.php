
@if(request()->query('app') != 1)
<div class="flex min-h-[78px] h-full w-full justify-between px-[60px] max-1180:px-8" style="background-color: #1A2140">
    @php
        // Default user name
        $userName = 'Utilisateur inconnu';
        $userSurname = '';

        // Retrieve user details from the session
        $userDetails = session('user_details', []); // Assuming user details are stored in the session

        // Get name and surname from user details
        if ($userDetails) {
            $userName = $userDetails['nom'] ?? 'Utilisateur inconnu';
            $userSurname = $userDetails['prenom'] ?? '';
        }
        $firstLetterOfuserName = substr($userName, 0, 1);
        $firstLetterOfuserSurname = substr($userSurname, 0, 1);
        // Combine name and surname

        function splitStringIntoWords($string)
        {
            $words = [];
            if (strpos($string, ' ') !== false) {
                $words = explode(' ', $string); // Split by space and return array
                for ($i = 0; $i < count($words); $i++) {
                    /* $words[$i] = substr($words[$i], 0, 1) . ' - '; */
                    if ($i == count($words) - 1) {
                        $words[$i] = substr($words[$i], 0, 1);
                    } else {
                        $words[$i] = substr($words[$i], 0, 1) . ' - ';
                    }
                }
                return $words;
            }

            return [substr($string, 0, 1)]; // Return the original string in an array if no space found
        }
        $fullName = $userName . '  ' . implode(splitStringIntoWords($userSurname));
        $casHost = config('cas.cas_hostname');
    @endphp

    <!-- Left Section -->
    <div class="flex items-center gap-x-10">
        <a href="{{ route('shop.home.index') }}" aria-label="@lang('shop::app.components.layouts.header.bagisto')" title="Accès à la page d'accueil"
            style="top: 55px; left: 30px; width: auto; height: 27px; opacity: 1;">
            <img src="{{ asset('Conseil_national-blanc-transformed.webp') }}" alt="{{ config('app.name') }}">
        </a>

        <!-- Category Dropdown -->
        <div class="flex items-center space-x-2 max-lg:w-full max-lg:justify-between max-md:flex-col">
            <x-shop::dropdown>
                <x-slot:toggle>
                    <button
                        class="custom-button   flex w-full max-w-[200px] cursor-pointer items-center justify-between gap-4
                                    rounded-lg p-3.5 text-base transition-all hover:border-gray-400
                                    focus:border-gray-400 max-md:w-[110px] max-md:border-0 max-md:pl-2.5 max-md:pr-2.5"
                        style="font-family: urbanist, sans-serif; font-size: 1.438rem; font-weight: 600; color: #F5F5F5;"
                        aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-6 h-6 text-white">
                            <line x1="4" x2="20" y1="12" y2="12"></line>
                            <line x1="4" x2="20" y1="6" y2="6"></line>
                            <line x1="4" x2="20" y1="18" y2="18"></line>
                        </svg>
                        <span   style="font-family: Urbanist, sans-serif;">Thématiques</span>
                    </button>
                </x-slot>

                <x-slot:menu>
                    <ul id="category-menu-web" class="dropdown-menu space-y-2">
                        <li class="text-center py-2"
                            style="font-family: urbanist, sans-serif; font-size: 1rem; font-weight: 600;">
                            Loading...
                        </li> <!-- Loading state -->
                    </ul>
                </x-slot>
            </x-shop::dropdown>
        </div>
    </div>

    <!-- Right Section -->
    <div class="flex items-center gap-x-9 max-[1100px]:gap-x-6 max-lg:gap-x-8 max-lg:w-full max-lg:justify-between"
        style="width: 80%">
        <!-- Search Input Section -->
        <div class="relative flex-grow flex justify-center max-lg:w-full" style="width: 100%">
            <form action="{{ route('shop.search.index') }}" class="flex items-center w-full"
                @if (
                    (Route::currentRouteName() === 'shop.product_or_category.index' ||
                        Route::currentRouteName() === 'shop.search.index') &&
                        !isset($product_app)) style="margin-top: 1.4%" @endif role="search">
                <div class="relative flex items-center w-full">
                  {{--    @if (Route::currentRouteName() === 'shop.product_or_category.index')
                        <div id="dynamic-category-container" class="absolute flex items-center px-2 py-1"
                            style="margin-left: 2.5%;  opacity: 1;">
                        </div>
                    @endif --}}

                    <input id="query_input" type="text" name="query" onclick="hideContent()"
                    class="pl-10 mx-4 block rounded-full border border-transparent bg-zinc-100 px-4 py-2 text-xs
                           font-medium text-gray-900 transition-all hover:border-gray-400 focus:border-gray-400"
                    minlength="0" maxlength="1000" aria-label="Recherchez des produits ici" aria-required="true"
                    required
                    @if (Route::currentRouteName() === 'shop.search.index')
                    value="{{ request('query') ?? '' }}"
                    @else
                    value=""
                    @endif
                    style="flex-grow: 1;
                           background: #FFFFFF 0% 0% no-repeat padding-box;
                           border: 1px solid #DFE1E5; border-radius: 35px; opacity: 1;
                           height:95%;
                           font-size: 1rem;"> <!-- Ajoutez cette ligne pour ajuster la taille de la police -->
                </div>
                <button class="p-2 rounded-full" style="background: #FDD320 0% 0% no-repeat padding-box; opacity: 1;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" style="color: #2A354F;">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </button>
            </form>
        </div>

        <!-- Category Dropdown -->
        <div class="flex items-center space-x-2 max-lg:w-full max-lg:justify-between max-md:flex-col">
            <x-shop::dropdown>
                <x-slot:toggle>
                    <button
                        class="flex w-full max-w-[200px] cursor-pointer items-center justify-between gap-4
                            rounded-lg p-3.5 text-base transition-all hover:border-gray-400
                            focus:border-gray-400 max-md:w-[110px] max-md:border-0 max-md:pl-2.5 max-md:pr-2.5"
                        style="font-family: urbanist, sans-serif; font-size: 1.438rem; font-weight: 600; color: #F5F5F5;"
                        aria-haspopup="true" aria-expanded="false">
                        <svg id="connexion" xmlns="http://www.w3.org/2000/svg" width="41" height="41"
                            viewBox="0 0 41 41" class="cursor-pointer">
                            <path id="circle-user"
                                d="M20.5,0A20.5,20.5,0,1,0,41,20.5,20.5,20.5,0,0,0,20.5,0Zm0,38.438a17.823,17.823,0,0,1-10.186-3.19,7.674,7.674,0,0,1,7.623-7.06h5.125a7.672,7.672,0,0,1,7.624,7.06A17.854,17.854,0,0,1,20.5,38.438Zm12.468-5.069a10.25,10.25,0,0,0-9.906-7.744H17.938A10.248,10.248,0,0,0,8.032,33.37a17.938,17.938,0,1,1,24.936,0ZM20.5,10.25a6.406,6.406,0,1,0,6.406,6.406A6.4,6.4,0,0,0,20.5,10.25Zm0,10.25a3.844,3.844,0,1,1,3.844-3.844A3.845,3.845,0,0,1,20.5,20.5Z"
                                fill="#f5f5f5"></path>
                        </svg>
                        <span
                            style="
                    font-family: Urbanist, sans-serif;
                    font-size: 67%;
                    font-weight: 600;
                    color: rgb(245, 245, 245);
                    display: inline-block;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    text-overflow: ellipsis;"
                            class="cursor-pointer" style="text-align: center">{{ $fullName ?? 'Utilisateur inconnu' }}
                        </span>
                    </button>
                </x-slot>

                <x-slot:menu>
                    <ul id="" class="dropdown-menu space-y-2">
                        <li class="bg-white hover:bg-gray-100 p-2 rounded-lg transition-colors duration-200">
                            <a href="https://{{ $casHost }}/moncompte/mes-infos" id="excluded_space">Mon espace</a>


                        </li>
                        <li class="bg-white hover:bg-gray-100 p-2 rounded-lg transition-colors duration-200">
                            <a href="{{ route('logout.cas') }}" id="excluded_logout">Déconnexion</a>

                        </li>
                    </ul>
                </x-slot>
            </x-shop::dropdown>
        </div>

        <style>
            .dropdown-menu {
                position: absolute;
                right: 0;
                margin-top: 8px;
                /* Adjust this for spacing */
                width: 12rem;
                /* Adjust as needed */
                background-color: white;
                color: black;
                border-radius: 0.375rem;
                /* Adjust as needed */
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
                /* Adjust as needed */
                z-index: 10;
            }

            .dropdown-menu.hidden {
                display: none;
            }
        </style>






    </div>
</div>
@endif

{{--

<script defer>
    window.onload = function() {
        // Define the API URL
        const apiUrl = '{{ route('shop.api.categories.tree') }}';

        // Fonction pour formater le nom de la catégorie
        const formatCategoryName = (name) => {
            // Remplacer les tirets simples et les virgules par " - "
            let formattedName = name.replace(/[-,]/g, ' - ');
            // Supprimer les espaces multiples
            formattedName = formattedName.replace(/\s+/g, ' ');
            // Ajouter un espace avant et après les tirets s'ils n'existent pas déjà
            formattedName = formattedName.replace(/\s*-\s*/g, ' - ');
            // Première lettre en majuscule pour chaque mot
            formattedName = formattedName.split(' ').map(word =>
                word !== '-' ? word.charAt(0).toUpperCase() + word.slice(1).toLowerCase() : word
            ).join(' ');

            return name;
        };

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

                // Iterate over categories and create dropdown items
                data.data.forEach(category => {
                    // Format category name
                    const formattedName = formatCategoryName(category.name);

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
    };
</script>
 --}}
