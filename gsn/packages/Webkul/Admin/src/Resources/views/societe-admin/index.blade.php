<x-admin::layouts>
    <x-slot:title>
        Liste des Sociétés
    </x-slot>

    {!! view_render_event('admin.societe.index.before') !!}

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            Liste des Sociétés
        </p>

        <!-- Search Form -->
        <form action="{{ route('admin::societe-admin.index') }}" method="GET" class="flex items-center gap-2">

            <label for="sort_order" class="text-sm font-medium text-gray-700">Trier par:</label>

            <select onchange="this.form.submit()" name="sort_order" id="sort_order"
                class="rounded-md p-2 border-gray-300 text-sm shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option class="p-2" value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ordre
                    Ascendant</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Ordre Descendant
                </option>
            </select>

            <input type="text" name="search" placeholder="Rechercher..." value="{{ request('search') }}"
                class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>
    </div>

    <div class="mt-3.5">
        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Logo</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Nom</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">partenaire
                            Congrè</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Adresse
                        </th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Site Web
                        </th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($societes as $societe)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">
                                @if ($societe->logo)
                                    <img src="{{ url($societe->logo) }}" width="50" height="50">
                                @else
                                    <img src="{{ url('themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp') }}"
                                        width="50" height="60">
                                @endif
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">{{ $societe->nom }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">
                                {{ $societe->is_congrate_partner ? 'partenaire Congrès' : 'non partenaire Congrès' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">{{ $societe->contact_email }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">{{ $societe->adresse }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">{{ $societe->site_web }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">
                                <div class="flex items-center gap-2">
                                    <!-- View Icon -->
                                    <a href="{{ route('admin::societe.societe.show', ['id' => $societe->id, 'page' => request('page', 1)]) }}"
                                        class="text-blue-600 hover:text-blue-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                             <title>Voir la société</title>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"></path>
                                        </svg>
                                    </a>

                                    <!-- Edit Icon -->
                                    <a href="{{ route('admin::societe.societe.edit', $societe->id) }}"
                                        class="text-yellow-600 hover:text-yellow-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                            </path>
                                             <title>Modifier la société</title>
                                        </svg>
                                    </a>

                                    <!-- Delete Icon with Modal -->
                                    <x-admin::modal>
                                        <x-slot:toggle>
                                            <button type="button" class="text-red-600 hover:text-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" width="24"
                                                    height="24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-3-3v3" />
                                             <title>Supprimer la société</title>
                                                    </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot:header>

                                            Confirmer la suppression
                                        </x-slot>

                                        <x-slot:content>
                                            <div class="p-4">
                                                <p class="text-gray-700 dark:text-gray-300 mb-4">Êtes-vous sûr de
                                                    vouloir supprimer la société "{{ $societe->nom }}" ? Cette action
                                                    est irréversible.</p>
                                                <div class="flex justify-end gap-3">
                                                    <form
                                                        action="{{ route('admin::societe.societe.delete', $societe->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </x-slot>
                                    </x-admin::modal>
                                    <x-admin::modal>
                                        <x-slot:toggle>

                                            <button type="button"
                                                class="text-emerald-600 bg-none hover:text-emerald-900">
                                                @if ($societe->is_congrate_partner)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-check-icon lucide-check">
                                                        <path d="M20 6 9 17l-5-5" />
                                                         <title>Mettre la société en non-partenaire du congrès</title>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-circle-x-icon lucide-circle-x">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <path d="m15 9-6 6" />
                                                        <path d="m9 9 6 6" />
                                                         <title>Mettre la société en partenaire du congrès</title>
                                                    </svg>
                                                @endif
                                            </button>
                                        </x-slot>

                                        <x-slot:header>

                                            Définir comme partenaire Congrè
                                        </x-slot>

                                        <x-slot:content>
                                            <div class="p-4">
                                                <p class="text-gray-700 dark:text-gray-300 mb-4">Êtes-vous sûr de
                                                    Êtes-vous sûr de vouloir définir la société "{{ $societe->nom }}"
                                                    comme partenaire Congrè ?
                                                    Cette action est irréversible.

                                                </p>
                                                <div class="flex justify-end gap-3">
                                                    <form
                                                        action="{{ route('admin::societe.societe.toggleSetIsCongratePartner', $societe->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-emerald-400 text-white rounded-md hover:bg-emerald-700">
                                                            Définir comme partenaire Congrè
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </x-slot>
                                    </x-admin::modal>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">{{ $societes->appends(['search' => request('search')])->links() }}</div>
        </div>
    </div>

    {!! view_render_event('admin.societe.index.after') !!}
</x-admin::layouts>
