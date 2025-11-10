<x-admin::layouts>
    <x-slot:title>
        Détails de la Société
    </x-slot>

    {!! view_render_event('admin.societe.show.before') !!}

    <!-- Button in the top-left corner -->
    <a href="{{ route('admin::societe-admin.index', ['page' => request('page', 1)]) }}"
        class="absolute top-15 right-10 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
        ← Retour
    </a>
    <br><br><br>
    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            Détails de la Société
        </p>
    </div>

    <div class="mt-3.5">
        <div class="box-shadow rounded bg-white p-6 dark:bg-gray-900">
            <div class="w-full">
                <!-- Societe Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Nom:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->nom }}</p>
                        </div>
                    </div>

                    <!-- Adresse -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Adresse:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->adresse }}</p>
                        </div>
                    </div>

                    <!-- Site Web -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Site Web:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->site_web }}</p>
                        </div>
                    </div>

                    <!-- SIREN -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">SIREN:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->siren }}</p>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Contact:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->contact_nom }}
                                {{ $societe->contact_prenom }}</p>
                        </div>
                    </div>

                    <!-- Fonction -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Fonction:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->contact_fonction }}</p>
                        </div>
                    </div>

                    <!-- Téléphone -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Téléphone:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->contact_telephone }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Email:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->contact_email }}</p>
                        </div>
                    </div>

                    <!-- Ville -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Ville:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->ville }}</p>
                        </div>
                    </div>

                    <!-- Code Postal -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Code Postal:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->code_postal }}</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Description:</p>
                            <p class="text-sm text-gray-800 dark:text-white">{{ $societe->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Editor Admin Details -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Informations de l'Éditeur</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nom de l'Éditeur -->
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Nom de l'Éditeur:</p>
                                <p class="text-sm text-gray-800 dark:text-white">
                                    {{ $admin->name ?? 'Non trouvé' }}
                                </p>
                            </div>
                        </div>

                        <!-- Email de l'Éditeur -->
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 text-gray-500 dark:text-gray-400">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Email de l'Éditeur:</p>
                                <p class="text-sm text-gray-800 dark:text-white">
                                    {{ $admin->email ?? 'Non trouvé' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {!! view_render_event('admin.societe.show.after') !!}
</x-admin::layouts>
