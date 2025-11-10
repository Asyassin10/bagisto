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
                <select name="sort_order" id="sort_order"
                    class="rounded-md p-2 border-gray-300 text-sm shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option class="p-2" value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ordre
                        Ascendant</option>
                    <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Ordre Descendant
                    </option>
                </select>
                <button type="submit" class="px-3 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 text-sm">
                    Trier
                </button>

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

                <!-- BULK ACTIONS SECTION WITH SELECT -->
                <div class="mb-4 p-4 bg-gray-900 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-4">
                            <!-- Actions Select Dropdown -->
                            <select id="bulkActionSelect" class="inline-flex w-full max-w-max cursor-pointer appearance-none items-center justify-between gap-x-2 rounded-md border bg-white px-2.5 py-1.5 text-center leading-6 text-gray-600 transition-all marker:shadow hover:border-gray-400 focus:border-gray-400 focus:ring-black dark:border-gray-800 dark
 :bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400" onchange="executeBulkAction()"
                                disabled>
                                <option value="">-- Actions en masse --</option>
                                <option value="set_partner">✅ Définir comme PARTENAIRE CONGRÈS</option>
                                <option value="remove_partner">❌ Définir comme NON PARTENAIRE</option>
                            </select>

                            <!-- Selected Count Display -->
                            <div class="px-0 py-0 text-gray-800 font-medium">
                                <span id="selectedCount">0</span> société(s) sélectionnée(s)
                            </div>
                            <!-- Clear Selection Button -->
                            <button type="button" id="clearSelectionBtn" onclick="clearAllSelections()"
                                style="    background: darkgray;"
                                class="px-4 py-2  text-white rounded-lg hover:bg-red-700 font-semibold hidden">
                                Effacer la sélection
                            </button>
                        </div>


                    </div>
                </div>

                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="px-4 py-2 text-left">
                                <input type="checkbox" id="selectAll"
                                    class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Logo
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Nom
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                Partenaire
                                Congrès</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Email
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Adresse
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Site
                                Web
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($societes as $societe)
                            <tr
                                class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="px-4 py-2">
                                    <input type="checkbox"
                                        class="societe-checkbox w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer"
                                        value="{{ $societe->id }}" data-societe-id="{{ $societe->id }}"
                                        data-societe-nom="{{ $societe->nom }}">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">
                                    @if ($societe->logo)
                                        <img src="{{ url($societe->logo) }}" width="50" height="50" class="rounded">
                                    @else
                                        <img src="{{ url('themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp') }}"
                                            width="50" height="60" class="rounded">
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 font-semibold">
                                    {{ $societe->nom }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">
                                    @if($societe->is_congrate_partner)
                                        <span
                                            class="inline-flex items-center px-3 py-1 text-xs font-bold text-green-800 bg-green-100 rounded-full">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            PARTENAIRE CONGRÈS
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 text-xs font-bold text-gray-700 bg-gray-100 rounded-full">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Non Partenaire
                                        </span>
                                    @endif
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

                                        <!-- Delete Icon -->
                                        <button type="button"
                                            onclick="if(confirm('Êtes-vous sûr de vouloir supprimer cette société ?')) { document.getElementById('delete-form-{{ $societe->id }}').submit(); }"
                                            class="text-red-600 hover:text-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" width="24" height="24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-3-3v3" />
                                                <title>Supprimer la société</title>
                                            </svg>
                                        </button>
                                        <form id="delete-form-{{ $societe->id }}"
                                            action="{{ route('admin::societe.societe.delete', $societe->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <!-- Toggle Partner Icon -->
                                        <button type="button"
                                            onclick="if(confirm('Voulez-vous changer le statut partenaire de cette société ?')) { document.getElementById('toggle-form-{{ $societe->id }}').submit(); }"
                                            class="text-emerald-600 bg-none hover:text-emerald-900">
                                            @if ($societe->is_congrate_partner)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M20 6 9 17l-5-5" />
                                                    <title>Mettre la société en non-partenaire du congrès</title>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="m15 9-6 6" />
                                                    <path d="m9 9 6 6" />
                                                    <title>Mettre la société en partenaire du congrès</title>
                                                </svg>
                                            @endif
                                        </button>
                                        <form id="toggle-form-{{ $societe->id }}"
                                            action="{{ route('admin::societe.societe.toggleSetIsCongratePartner', $societe->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Hidden Form for Bulk Actions -->
                <form id="bulkActionForm" action="{{ route('admin::societe.societe.bulkSetPartner') }}" method="POST"
                    style="display: none;">
                    @csrf
                    <input type="hidden" name="societe_ids" id="bulkSocieteIds">
                    <input type="hidden" name="is_partner" id="bulkIsPartner">
                </form>

                <!-- Pagination -->
                <div class="mt-4">{{ $societes->appends(['search' => request('search')])->links() }}</div>
            </div>
        </div>

        {!! view_render_event('admin.societe.index.after') !!}
        @push('scripts')
            @include('admin::societe-admin.societes-script')
        @endpush

</x-admin::layouts>