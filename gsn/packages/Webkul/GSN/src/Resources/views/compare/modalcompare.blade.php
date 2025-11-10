<x-shop::modal :id="$modalId">
    <x-slot:toggle>
        <button type="button" data-open="{{ $modalId }}" style="display: none;"></button>
    </x-slot:toggle>

    <x-slot:content>
        <!-- Wrapper pour activer le scroll sur toute la popup -->
        <div class="max-h-[85vh] overflow-y-auto overflow-x-hidden">
            <div class="flex">
                <!-- Filter Sidebar -->
                <div class="filter-sidebar-{{ $modalId }} w-64 border-r p-4 overflow-y-auto" style="width: 25%;">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-2">Filtres :</h3>
                        <p class="text-sm text-gray-500">Chargement des filtres...</p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="flex-1 overflow-y-auto p-4" data-container="{{ $modalId }}">
                    <div class="flex justify-between items-center w-full">
                        {{-- Zone de recherche désactivée --}}
                    </div>
                    <div class="mt-2">
                        <span id="comparison-count" class="text-sm text-gray-500"></span>
                    </div>

                    <!-- Product container -->
                    <div class="dynamic-product-container-{{ $modalId }} mt-4">
                        <!-- Products will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </x-slot:content>

    <x-slot:footer>
        <div class="flex justify-end gap-2">
            <button type="button" style="background-color: rgb(10, 145, 10)"
                class="text-white px-4 py-2 text-gray-600 border border-gray-300 rounded hover:bg-gray-50 transition-colors"
                onclick="closeModalAndRefresh()">
                Comparer
            </button>
        </div>
    </x-slot:footer>
</x-shop::modal>
