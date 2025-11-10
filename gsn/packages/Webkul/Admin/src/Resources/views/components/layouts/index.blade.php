<!DOCTYPE html>

<html class="{{ request()->cookie('dark_mode') ?? 0 ? 'dark' : '' }}" lang="{{ app()->getLocale() }}"
    dir="{{ core()->getCurrentLocale()->direction }}">

<head>

    {!! view_render_event('bagisto.admin.layout.head.before') !!}

    <title>{{ $title ?? '' }}</title>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url()->to('/') }}">
    <meta name="currency" content="{{ core()->getBaseCurrency()->toJson() }}">

    @stack('meta')
 
    @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet" />

    <link rel="preload" as="image" href="{{ url('cache/logo/bagisto.png') }}">

    @if ($favicon = core()->getConfigData('general.design.admin_logo.favicon'))
        <link type="image/x-icon" href="{{asset("favicon-32x32.png")}}" rel="shortcut icon" sizes="16x16">
    @else
        <link type="image/x-icon"  href="{{asset("favicon-32x32.png")}}" rel="shortcut icon" sizes="16x16" />
    @endif

    @stack('styles')

    <style>
        {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!}
    </style>

    {!! view_render_event('bagisto.admin.layout.head.after') !!}


</head>

<body class="h-full dark:bg-gray-950">
    {!! view_render_event('bagisto.admin.layout.body.before') !!}

    <div id="app" class="h-full">
        <!-- Flash Message Blade Component -->
        <x-admin::flash-group />

        <!-- Confirm Modal Blade Component -->
        <x-admin::modal.confirm />

        {!! view_render_event('bagisto.admin.layout.content.before') !!}

        <!-- Page Header Blade Component -->
        <x-admin::layouts.header />

        <div class="group/container {{ request()->cookie('sidebar_collapsed') ?? 0 ? 'sidebar-collapsed' : 'sidebar-not-collapsed' }} flex gap-4"
            ref="appLayout">
            <!-- Page Sidebar Blade Component -->
            <x-admin::layouts.sidebar />

            <div
                class="max-w-full flex-1 bg-white px-4 pb-6 pt-3 transition-all duration-300 dark:bg-gray-950 max-lg:!px-4 ltr:pl-[286px] group-[.sidebar-collapsed]/container:ltr:pl-[85px] rtl:pr-[286px] group-[.sidebar-collapsed]/container:rtl:pr-[85px]">
                <!-- Added dynamic tabs for third level menus  -->
                <!-- Todo @suraj-webkul need to optimize below statement. -->
                @if (!request()->routeIs('admin.configuration.index'))
                    <x-admin::layouts.tabs />
                @endif

                <!-- Page Content Blade Component -->
                {{ $slot }}
            </div>
        </div>

        {!! view_render_event('bagisto.admin.layout.content.after') !!}
    </div>

    {!! view_render_event('bagisto.admin.layout.body.after') !!}

    @stack('scripts')

    {!! view_render_event('bagisto.admin.layout.vue-app-mount.before') !!}

    <script>
        /**
         * Load event, the purpose of using the event is to mount the application
         * after all of our `Vue` components which is present in blade file have
         * been registered in the app. No matter what `app.mount()` should be
         * called in the last.
         */
        window.addEventListener("load", function(event) {
            app.mount("#app");

            const selectAllCheckbox = document.getElementById('selectAll');
            const societeCheckboxes = document.querySelectorAll('.societe-checkbox');
            const selectedCount = document.getElementById('selectedCount');
            const bulkActionSelect = document.getElementById('bulkActionSelect');
            const clearSelectionBtn = document.getElementById('clearSelectionBtn');

            // Initialize checkboxes based on sessionStorage
            function initializeCheckboxes() {
                societeCheckboxes.forEach(checkbox => {
                    const societeId = parseInt(checkbox.value);
                    if (selectedSocietes.includes(societeId)) {
                        checkbox.checked = true;
                    }
                });
                updateUI();
            }

            // Update UI based on selections
            function updateUI() {
                const count = selectedSocietes.length;
                selectedCount.textContent = count;

                if (count > 0) {
                    bulkActionSelect.disabled = false;
                    bulkActionSelect.classList.remove('opacity-50', 'cursor-not-allowed');
                    clearSelectionBtn.classList.remove('hidden');
                } else {
                    bulkActionSelect.disabled = true;
                    bulkActionSelect.classList.add('opacity-50', 'cursor-not-allowed');
                    clearSelectionBtn.classList.add('hidden');
                    bulkActionSelect.value = '';
                }

                // Update select all checkbox state
                const allCurrentPageChecked = Array.from(societeCheckboxes).every(cb => cb.checked);
                const someCurrentPageChecked = Array.from(societeCheckboxes).some(cb => cb.checked);

                if (allCurrentPageChecked && societeCheckboxes.length > 0) {
                    selectAllCheckbox.checked = true;
                    selectAllCheckbox.indeterminate = false;
                } else if (someCurrentPageChecked) {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = true;
                } else {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;
                }
            }

            // Handle individual checkbox change
            societeCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const societeId = parseInt(this.value);

                    if (this.checked) {
                        if (!selectedSocietes.includes(societeId)) {
                            selectedSocietes.push(societeId);
                        }
                    } else {
                        const index = selectedSocietes.indexOf(societeId);
                        if (index > -1) {
                            selectedSocietes.splice(index, 1);
                        }
                    }

                    sessionStorage.setItem('selectedSocietes', JSON.stringify(selectedSocietes));
                    updateUI();
                });
            });

            // Handle select all checkbox
            selectAllCheckbox.addEventListener('change', function () {
                const isChecked = this.checked;

                societeCheckboxes.forEach(checkbox => {
                    const societeId = parseInt(checkbox.value);
                    checkbox.checked = isChecked;

                    if (isChecked) {
                        if (!selectedSocietes.includes(societeId)) {
                            selectedSocietes.push(societeId);
                        }
                    } else {
                        const index = selectedSocietes.indexOf(societeId);
                        if (index > -1) {
                            selectedSocietes.splice(index, 1);
                        }
                    }
                });

                sessionStorage.setItem('selectedSocietes', JSON.stringify(selectedSocietes));
                updateUI();
            });

            // Initialize on page load
            initializeCheckboxes();
        });

        // Execute bulk action from select dropdown
        function executeBulkAction() {
            const select = document.getElementById('bulkActionSelect');
            const action = select.value;

            if (!action) return;

            const count = selectedSocietes.length;
            if (count === 0) {
                alert('Veuillez sélectionner au moins une société.');
                select.value = '';
                return;
            }

            let message = '';
            let isPartner = null;

            switch (action) {
                case 'set_partner':
                    message = `Êtes-vous sûr de vouloir définir les sociétés sélectionnées comme partenaire congrès ?\n(Nombre de sociétés sélectionnées: ${count})`;
                    isPartner = '1';
                    break;
                case 'remove_partner':
                    message = `Êtes-vous sûr de vouloir définir les sociétés sélectionnées comme non partenaire congrès ?\n(Nombre de sociétés sélectionnées : ${count})`;
                    isPartner = '0';
                    break;
                default:
                    return;
            }

            if (confirm(message)) {
                document.getElementById('bulkSocieteIds').value = JSON.stringify(selectedSocietes);
                document.getElementById('bulkIsPartner').value = isPartner;
                document.getElementById('bulkActionForm').submit();
                sessionStorage.removeItem('selectedSocietes');
            } else {
                select.value = '';
            }
        }

        // Clear all selections
        function clearAllSelections() {
            selectedSocietes = [];
            sessionStorage.removeItem('selectedSocietes');
            document.querySelectorAll('.societe-checkbox').forEach(cb => cb.checked = false);
            document.getElementById('selectAll').checked = false;
            document.getElementById('bulkActionSelect').value = '';
            updateUI();
        }

        // Update UI function (for global access)
        // Update UI function (for global access)
        function updateUI() {
            const selectedCount = document.getElementById('selectedCount');
            const bulkActionSelect = document.getElementById('bulkActionSelect');
            const clearSelectionBtn = document.getElementById('clearSelectionBtn');
            const societeCheckboxes = document.querySelectorAll('.societe-checkbox');
            const selectAllCheckbox = document.getElementById('selectAll');

            const count = selectedSocietes.length;
            selectedCount.textContent = count;

            if (count > 0) {
                bulkActionSelect.disabled = false;
                bulkActionSelect.classList.remove('opacity-50', 'cursor-not-allowed');
                clearSelectionBtn.classList.remove('hidden');
            } else {
                bulkActionSelect.disabled = true;
                bulkActionSelect.classList.add('opacity-50', 'cursor-not-allowed');
                clearSelectionBtn.classList.add('hidden');
                bulkActionSelect.value = '';
            }

            // Update checkboxes state
            societeCheckboxes.forEach(checkbox => {
                const societeId = parseInt(checkbox.value);
                checkbox.checked = selectedSocietes.includes(societeId);
            });

            // Update select all state
            const allChecked = societeCheckboxes.length > 0 && Array.from(societeCheckboxes).every(cb => cb.checked);
            const someChecked = Array.from(societeCheckboxes).some(cb => cb.checked);

            selectAllCheckbox.checked = allChecked;
            selectAllCheckbox.indeterminate = !allChecked && someChecked;
        }
 
    
    </script>

    {!! view_render_event('bagisto.admin.layout.vue-app-mount.after') !!}
</body>

</html>
