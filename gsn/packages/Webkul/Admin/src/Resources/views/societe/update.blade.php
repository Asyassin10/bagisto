<x-admin::layouts>
    <x-slot:title>
        Société
    </x-slot>

    {!! view_render_event('admin.societe.update.before') !!}

    <!-- Societe Update Form -->
    <x-admin::form method="POST" action="{{ route('admin.societe.update') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {!! view_render_event('admin.societe.update.update_form_controls.before') !!}

        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                Gestion des informations de votre société
            </p>
        </div>

        <!-- Full Panel -->
        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">

            <!-- Left Section -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                {!! view_render_event('admin.societe.update.card.general.before') !!}

                <!-- General -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <!-- Nom de société -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label class="required">
                            Nom
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="nom"
                            value="{{ old('nom', $societe->nom ?? '') }}" rules="required" />

                        <x-admin::form.control-group.error control-name="nom" />
                    </x-admin::form.control-group>

                    <!-- Adresse du siège -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label class="required">
                            Adresse
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="adresse"
                            value="{{ old('adresse', $societe->adresse ?? '') }}" rules="required" />

                        <x-admin::form.control-group.error control-name="adresse" />
                    </x-admin::form.control-group>

                    <!-- Code postal du contact principal -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Code postal
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="code_postal"
                            value="{{ old('code_postal', $societe->code_postal ?? '') }}" />

                        <x-admin::form.control-group.error control-name="code_postal" />
                    </x-admin::form.control-group>

                    <!-- Ville du contact principal -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Ville
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="ville"
                            value="{{ old('ville', $societe->ville ?? '') }}" />

                        <x-admin::form.control-group.error control-name="ville" />
                    </x-admin::form.control-group>

                    <!-- Site web -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Site web
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="site_web"
                            value="{{ old('site_web', $societe->site_web ?? '') }}" />

                        <x-admin::form.control-group.error control-name="site_web" />
                    </x-admin::form.control-group>

                    <!-- SIREN -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label class="required">
                            Siren
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="siren"
                            value="{{ old('siren', $societe->siren ?? '') }}" rules="required" />

                        <x-admin::form.control-group.error control-name="siren" />
                    </x-admin::form.control-group>

                    <!-- Nom du contact principal -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Nom du contact principal
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="contact_nom"
                            value="{{ old('contact_nom', $societe->contact_nom ?? '') }}" />

                        <x-admin::form.control-group.error control-name="contact_nom" />
                    </x-admin::form.control-group>

                    <!-- Prénom du contact principal -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Prénom du contact principal
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="contact_prenom"
                            value="{{ old('contact_prenom', $societe->contact_prenom ?? '') }}" />

                        <x-admin::form.control-group.error control-name="contact_prenom" />
                    </x-admin::form.control-group>

                    <!-- Fonction du contact principal -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Contact fonction
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="contact_fonction"
                            value="{{ old('contact_fonction', $societe->contact_fonction ?? '') }}" />

                        <x-admin::form.control-group.error control-name="contact_fonction" />
                    </x-admin::form.control-group>

                    <!-- Téléphone du contact principal -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Téléphone du contact
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="text" name="contact_telephone"
                            value="{{ old('contact_telephone', $societe->contact_telephone ?? '') }}" />

                        <x-admin::form.control-group.error control-name="contact_telephone" />
                    </x-admin::form.control-group>

                    <!-- Email du contact principal -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Email du contact
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="email" name="contact_email"
                            value="{{ old('contact_email', $societe->contact_email ?? '') }} " required />

                        <x-admin::form.control-group.error control-name="contact_email" />
                    </x-admin::form.control-group>


                    <!-- Logo -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Logo
                        </x-admin::form.control-group.label>

                        @if ($societe && !is_null($societe->logo))
                            <!-- Display existing logo -->
                            <div class="mb-2">
                                <img src="{{ asset($societe->logo) }}" alt="Logo"
                                    class="w-32 h-auto border rounded">
                            </div>
                        @endif

                        <!-- File input for logo -->
                        <x-admin::form.control-group.control type="file" name="logo" accept="image/*" />
                        <span style="color: rgb(225, 56, 56)">Les formats acceptés pour le logo : PNG, JPEG, JPG, WEBP, SVG.</span>

                        <x-admin::form.control-group.error control-name="logo" />
                    </x-admin::form.control-group>


                    <!-- Description -->
                    <x-admin::form.control-group>
                        <x-admin::form.control-group.label>
                            Présentez votre entreprise
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control type="textarea" name="description"
                            value="{{ old('description', $societe->description ?? '') }}" />
                        <x-admin::form.control-group.error control-name="description" />
                    </x-admin::form.control-group>

                    <!-- Save Button -->
                    <div class="flex items-center gap-x-2.5">
                        <button type="submit" class="primary-button">
                            Enregistrer
                        </button>
                    </div>
                </div>

                {!! view_render_event('admin.societe.update.card.general.after') !!}

                <!-- Add any additional sections as needed -->
            </div>

            <!-- Right Section -->
            <div class="flex w-[360px] max-w-full flex-col gap-2">
                <!-- Settings (if applicable) -->

                {!! view_render_event('admin.societe.update.card.accordion.settings.before') !!}

                <!-- Example: Accordion Section -->

                {!! view_render_event('admin.societe.update.card.accordion.settings.after') !!}
            </div>
        </div>

        {!! view_render_event('admin.societe.update.update_form_controls.after') !!}
    </x-admin::form>

    {!! view_render_event('admin.societe.update.after') !!}

    @pushOnce('scripts')
        <!-- Additional JavaScript or Vue components if necessary -->
    @endPushOnce
</x-admin::layouts>
