<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.catalog.products.edit.title')
    </x-slot>
    <link rel="stylesheet" href="{{ asset('modal.css') }}">

    {!! view_render_event('bagisto.admin.catalog.product.edit.before', ['product' => $product]) !!}

    <x-admin::form method="PUT" enctype="multipart/form-data" id="edit-form"
        action="{{ route('admin.catalog.products.update', ['id' => $product->id]) }}">
        {!! view_render_event('bagisto.admin.catalog.product.edit.actions.before', ['product' => $product]) !!}

        <!-- Page Header -->
        <div class="grid gap-2.5">
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <div class="grid gap-1.5">
                    <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white ">
                        @lang('admin::app.catalog.products.edit.title')
                    </p>
                </div>

                <div class="flex items-center gap-x-2.5">
                    <!-- Back Button -->
                    <a href="{{ route('admin.catalog.products.index') }}"
                        class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800">
                        @lang('admin::app.account.edit.back-btn')
                    </a>
                    {{--  <a href="{{ route('shop.product_or_category.index', [$product->url_key]) }}" target="_blank"
                        class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800">
                        @lang('admin::app.account.edit.visualise')
                    </a> --}}

                    <!-- Preview Button -->
                  {{--   @if ($product->status && $product->visible_individually && $product->url_key)
                        <a href="{{ route('admin.catalog.products.visualize', ["slug" => $product->url_key]) }}?app=1"
                            class="secondary-button" target="_blank">
                            @lang('admin::app.catalog.products.edit.preview')
                        </a>
                    @endif --}}
                </div>
            </div>
        </div>

        @php
$channels = core()->getAllChannels();

$currentChannel = core()->getRequestedChannel();

$currentLocale = core()->getRequestedLocale();
        @endphp

        <!-- Channel and Locale Switcher -->
        <div class="mt-7 flex items-center justify-between gap-4 max-md:flex-wrap">
            <div class="flex items-center gap-x-1">


                <!-- Channel Switcher -->
                <x-admin::dropdown :class="$channels->count() <= 1 ? 'hidden' : ''">
                    <!-- Dropdown Toggler -->
                    <x-slot:toggle>
                        <button type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800">
                            <span class="icon-store text-2xl"></span>

                            {{ $currentChannel->name }}

                            <input type="hidden" name="channel" value="{{ $currentChannel->code }}" />

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                    </x-slot>

                    <!-- Dropdown Content -->
                    <x-slot:content class="!p-0">
                        @foreach ($channels as $channel)
                            <a href="?{{ Arr::query(['channel' => $channel->code, 'locale' => $currentLocale->code]) }}"
                                class="flex cursor-pointer gap-2.5 px-5 py-2 text-base hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950">
                                {{ $channel->name }}
                            </a>
                        @endforeach
                    </x-slot>
                </x-admin::dropdown>

                <!-- Locale Switcher -->
                <x-admin::dropdown :class="$currentChannel->locales->count() <= 1 ? 'hidden' : ''">
                    <!-- Dropdown Toggler -->
                    <x-slot:toggle>
                        <button type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800">
                            <span class="icon-language text-2xl"></span>

                            {{ $currentLocale->name }}

                            <input type="hidden" name="locale" value="{{ $currentLocale->code }}" />

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                    </x-slot>

                    <!-- Dropdown Content -->
                    <x-slot:content class="!p-0">
                        @foreach ($currentChannel->locales->sortBy('name') as $locale)
                            <a href="?{{ Arr::query(['channel' => $currentChannel->code, 'locale' => $locale->code]) }}"
                                class="flex gap-2.5 px-5 py-2 text-base cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-950 dark:text-white {{ $locale->code == $currentLocale->code ? 'bg-gray-100 dark:bg-gray-950' : '' }}">
                                {{ $locale->name }}
                            </a>
                        @endforeach
                    </x-slot>
                </x-admin::dropdown>
            </div>
        </div>


        {!! view_render_event('bagisto.admin.catalog.product.edit.actions.after', ['product' => $product]) !!}
        <p class="text-red-500 mb-4">
            Les champs contenant " * " sont obligatoires.
        </p>
        <!-- body content -->
        {!! view_render_event('bagisto.admin.catalog.product.edit.form.before', ['product' => $product]) !!}
        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">

            @foreach ($product->attribute_family->attribute_groups->reject(function ($attributeGroup) {
    return $attributeGroup->code === 'inventories' || $attributeGroup->code === 'price' || $attributeGroup->code === 'meta_description' || $attributeGroup->code === 'short_description';
    //    return $attributeGroup->code === 'price' || $attributeGroup->code === '';
})->groupBy('column') as $column => $groups)
                {!! view_render_event('bagisto.admin.catalog.product.edit.form.column_' . $column . '.before', [
        'product' => $product,
    ]) !!}

                <div
                    class="flex flex-col gap-2 {{ $column == 1 ? 'flex-1 max-xl:flex-auto' : 'w-[360px] max-w-full max-sm:w-full' }}">
                    @if ($product->categories->count() > 0)
                        <h1>
                            Category : {{ $product->categories[0]->name }}
                        </h1>
                    @endif

                    @foreach ($groups as $group)
                        @php
        $customAttributes = $product->getEditableAttributes($group)->reject(function ($gr) {
            return $gr->code === 'sku' ||
                $gr->code === 'short_description' ||
                $gr->code === 'weight' ||
                $gr->code === 'visible_individually';
        });

                        @endphp
                        @if (count($customAttributes))
                            {!! view_render_event('bagisto.admin.catalog.product.edit.form.' . $group->code . '.before', [
                'product' => $product,
            ]) !!}

                            <div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
                                @if ($group->name == 'Prix')
                                @else
                                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                                        {{ $group->name }}
                                    </p>
                                @endif


                               {{--  @if ($group->code == 'meta_description')
                                    <!-- SEO Title & Description Blade Componnet -->
                                    <x-admin::seo />
                                @endif --}}


                                @foreach ($customAttributes as $attribute)
                                    {!! view_render_event('bagisto.admin.catalog.product.edit.form.' . $group->code . '.controls.before', [
                    'product' => $product,
                ]) !!}

                                    @php
                $isPriceField = in_array($attribute->admin_name, [
                    'Prix',
                    'Coût',
                    'Prix spécial',
                    'Prix spécial (à partir de)',
                    'Prix spécial (jusqu\'à)',
                ]);
                                    @endphp

                                    <x-admin::form.control-group
                                        class="{{ !$isPriceField ? 'last:!mb-0' : 'hidden' }}">
                                        @if ($attribute->code == '3BlnHKhXvk4OMhmc')
                                            <h1 class="my-4 font-bold">Général</h1>
                                        @endif
                                        @if ($attribute->code == 'cca_c748a')
                                            <h1 class="my-4 font-bold">Facturation et paiement</h1>
                                        @endif
                                        @if ($attribute->code == '9JKOI0HXGrjKKzDB')
                                            <h1 class="my-4 font-bold">Services complémentaires</h1>
                                        @endif

                                        <x-admin::form.control-group.label>
                                            {!! $attribute->admin_name . ($attribute->is_required ? '<span class="required"></span>' : '') !!}

                                            @if ($attribute->value_per_channel && $channels->count() > 1)
                                                <span
                                                    class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[10px] font-semibold leading-normal text-gray-600">
                                                    {{ $currentChannel->name }}
                                                </span>
                                            @endif

                                            @if ($attribute->value_per_locale)
                                                <span
                                                    class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[10px] font-semibold leading-normal text-gray-600">
                                                    {{ $currentLocale->name }}
                                                </span>
                                            @endif
                                            @if ($attribute->is_filterable)
                                                <span
                                                    class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[10px] font-semibold leading-normal text-gray-600">
                                                    (filtre)
                                                </span>
                                            @endif

                                        </x-admin::form.control-group.label>

                                        @include ('admin::catalog.products.edit.controls', [
                    'attribute' => $attribute,
                    'product' => $product,
                ])

                                        @if ($isPriceField)
                                            <x-admin::form.control-group.error :control-name="$attribute->code" value="0" />s
                                        @endif
                                        @if ($attribute->code !== 'url_key')
                                            <x-admin::form.control-group.error :control-name="$attribute->code .
                                                (in_array($attribute->type, ['multiselect', 'checkbox']) ? '[]' : '')" />
                                        @endif


                                    </x-admin::form.control-group>
                                    @if ($attribute->code == 'status')
                                        <h1>
                                            <span class="font-bold"> NB</span>: Si le statut n'est pas "actif", le
                                            logiciel ne sera pas visible en ligne
                                        </h1>
                                    @endif




                                    {!! view_render_event('bagisto.admin.catalog.product.edit.form.' . $group->code . '.controls.before', [
                    'product' => $product,
                ]) !!}
                                @endforeach

                                {{-- @includeWhen($group->code == 'price', 'admin::catalog.products.edit.price.group') --}}

                                {{-- @includeWhen(
                $group->code == 'inventories' && !$product->getTypeInstance()->isComposite(),
                'admin::catalog.products.edit.inventories'
            ) --}}
                            </div>


                            {!! view_render_event('bagisto.admin.catalog.product.edit.form.' . $group->code . '.after', [
                'product' => $product,
            ]) !!}
                        @endif
                    @endforeach

                    @if ($column == 1)
                        <!-- Images View Blade File -->
                        {{--  @include('admin::catalog.products.edit.images')

                        <!-- Videos View Blade File -->
                        @include('admin::catalog.products.edit.videos') --}}

                        <!-- Product Type View Blade File -->
                        @includeIf('admin::catalog.products.edit.types.' . $product->type)

                        <!-- Related, Cross Sells, Up Sells View Blade File -->
                        {{--      @include('admin::catalog.products.edit.links')
 --}}
                        <!-- Include Product Type Additional Blade Files If Any -->
                        @foreach ($product->getTypeInstance()->getAdditionalViews() as $view)
                            @includeIf($view)
                        @endforeach
                    @else
                        <!-- Channels View Blade File -->
                        @include('admin::catalog.products.edit.channels')

                        <!-- Categories View Blade File -->
                        @include('admin::catalog.products.edit.categories')
                    @endif
                </div>

                {!! view_render_event('bagisto.admin.catalog.product.edit.form.column_' . $column . '.after', [
        'product' => $product,
    ]) !!}
            @endforeach
        </div>
        <input type="hidden" name="should_validate" value="oui" id="should_validate">
        <input type="hidden" name="just_ignore_status" value="non" id="just_ignore_status">
        <div class="grid gap-2.5 mt-2">
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <div class=" flex">
                    <!-- Save Button -->
                    <button type="button" class="primary-button" onclick="saveData()">
                        @lang('admin::app.catalog.products.edit.save-btn')
                    </button>
                    <button type="button" class="primary-button"
                        style="margin-left: 1rem /* 16px */;margin-right: 1rem /* 16px */;"
                        onclick="return justSave(event)">
                        Enregistrer pour plus tard
                    </button>

                </div>
            </div>
        </div>
        <!-- Custom Modal -->
        <div id="custom-modal" class="modal">
            <div class="modal-content">
                <!-- Modal Title -->
                <h3 class="modal-title">Avertissement de Statut</h3>

                <!-- Modal Message -->
                <p class="modal-message">
                 Le statut de la fiche n'est pas Actif, elle ne sera pas publiée
                </p>

                <!-- Buttons Container -->
                <div class="modal-buttons">
                    <!-- Submit Button -->
                    <button id="submit-form" type="button" class="modal-button submit-button" onclick="saveWithStatisInactive()">
                        Continuer
                    </button>

                    <!-- Cancel Button -->
                    <button id="close-modal" type="button" onclick="hideModal()" class="modal-button cancel-button">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </x-admin::form>
    <!-- JavaScript -->


    <div id="appoloappolo" data-show-modal="{{ session('show_modal') === 'ok' ? 'true' : 'false' }}"></div>
    <script src="{{ asset('appjs/adminSoftwareEdit.js') }}"></script>
    {{--
    <script>
        // Function to show the modal
        function showModal() {
            const modal = document.getElementById('custom-modal');
            if (modal) {
                modal.style.display = 'flex'; // Show the modal
            }
        }

        // Function to hide the modal
        function hideModal() {
            const modal = document.getElementById('custom-modal');
         //   console.log("hide modal")
            if (modal) {
                modal.style.display = 'none'; // Hide the modal
            }
        }

        function justSave(event) {
            event.preventDefault();
            event.stopPropagation();




            requestAnimationFrame(() => {
                console.log("Dans requestAnimationFrame - après le rendu visuel");

                // Puis setTimeout(0) pour s'assurer d'être en fin de file d'événements
                setTimeout(() => {
                    console.log("Dans setTimeout - en fin de file d'événements");

                    // Trouver le formulaire
                    const form = document.getElementById('edit-form');

                    // Définir explicitement l'action du formulaire (remplacez par votre URL)
                    const formAction =
                        "{{ route('admin.catalog.products.update', ['id' => $product->id]) }}"


                    // Sauvegarder l'action originale
                    const originalAction = form.getAttribute('action');

                    // Définir la nouvelle action
                    //  form.setAttribute('action', formAction);
                    console.log("Action du formulaire définie sur:", formAction);

                    // Ajouter le champ caché pour le mode brouillon
                    const draftInput = document.createElement('input');
                    draftInput.type = 'hidden';
                    draftInput.name = 'should_validate';
                    draftInput.value = 'non';
                    form.appendChild(draftInput);
                    console.log("Champ caché 'should_validate' ajouté:", draftInput);
                    const MethodInput = document.createElement('input');
                    MethodInput.type = 'hidden';
                    MethodInput.name = '_method';
                    MethodInput.value = 'PUT';
                    const statusInput = document.getElementById('status');
                    statusInput.checked = 0;
                    form.appendChild(MethodInput);
                    console.log("Champ caché 'MethodInput' ajouté:", MethodInput);

                    // En mode test, on ne soumet pas réellement le formulaire
                    console.log("SIMULATION: Le formulaire serait soumis à", formAction);
                    console.log("Pour soumettre réellement, décommentez la ligne 'form.submit()'");

                    form.submit(); // Décommenter pour la soumission réelle

                    // Restaurer l'action originale après soumission (pour éviter des effets secondaires)
                    // setTimeout(() => {
                    //     if (originalAction) {
                    //         form.setAttribute('action', originalAction);
                    //     } else {
                    //         form.removeAttribute('action');
                    //     }
                    // }, 100);

                }, 0);
            });
        }

        function validateStatus(event) {
            const statusInput = document.getElementById('status');

            if (statusInput) {
                console.log('Status input exists.');
                console.log('Status value before submission:', statusInput.checked);

                if (!statusInput.checked) {
                    showModal(); // Show the modal
                    event.preventDefault(); // Prevent form submission
                    return false; // Explicitly return false to prevent form submission
                } else {
                    console.log('Status input is checked (enabled).');
                    return true; // Allow form submission
                }
            } else {
                console.error('Status input does not exist.');
                event.preventDefault(); // Prevent form submission if status input is missing
                return false; // Explicitly return false to prevent form submission
            }
        }


        // Version testable dans la console


        // Add event listener for the Submit Anyway button
        document.addEventListener('DOMContentLoaded', function() {
            const submitFormButton = document.getElementById('submit-form');
            const should_validate_btn = document.getElementById('should_validate_btn');
            const closeModel = document.getElementById('close-modal');
            const form = document.getElementById('edit-form');

            if (submitFormButton && form) {
                submitFormButton.addEventListener('click', function() {
                console.log("clicked from btn save");
                    hideModal(); // Hide the modal
                 //   form.submit(); // Submit the form
                });
                closeModel.addEventListener('click', function() {
                    hideModal(); // Hide the modal
                    const  statusInput = document.getElementById('status');
                    statusInput.checked = 0;
                });
            }


        });
        @if(session('show_modal') === 'ok')
            showModal(); // Show the modal
        @endif
       function saveWithStatisInactive() {
            const submitFormButton = document.getElementById('submit-form');
            const just_ignore_status = document.getElementById('just_ignore_status');
            const should_validate_btn = document.getElementById('should_validate_btn');
            const closeModel = document.getElementById('close-modal');
            const form = document.getElementById('edit-form');
            console.log("clicked")
            if (submitFormButton && form) {
                console.log("clickedclickedclicked")
                    const statusInput = document.getElementById('status');
                    statusInput.checked = 0;

                    just_ignore_status.value = "oui";
                    const modal = document.getElementById('custom-modal');
                    // console.log("hide modal")
                    if (modal) {
                        modal.style.display = 'none'; // Hide the modal
                    }
                    // hideModal(); // Hide the modal
                    form.submit(); // Submit the form

            }
        }
       function saveData() {
            const submitFormButton = document.getElementById('submit-form');
            const should_validate_btn = document.getElementById('should_validate_btn');
            const closeModel = document.getElementById('close-modal');
            const form = document.getElementById('edit-form');
            console.log("clicked")
            if (submitFormButton && form) {
                console.log("clickedclickedclicked")


                    const modal = document.getElementById('custom-modal');
                    // console.log("hide modal")
                    if (modal) {
                        modal.style.display = 'none'; // Hide the modal
                    }
                    // hideModal(); // Hide the modal
                    form.submit(); // Submit the form

            }
        }
    </script>
    --}}
</x-admin::layouts>
