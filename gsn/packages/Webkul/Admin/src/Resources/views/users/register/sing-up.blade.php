<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" sizes="16x16"  href="{{asset("favicon-32x32.png")}}" />
    <link rel="preload" as="style" href="{{ asset('themes/shop/default/build/assets/app-96ca2ca5.css') }}" />
    <link rel="preload" as="style" href="{{ asset('themes/shop/default/build/assets/app-05f8acf7.css') }}" />
    <link rel="modulepreload" href="{{ asset('themes/shop/default/build/assets/app-f2077b75.js') }}" />
    <link rel="stylesheet" href="{{ asset('themes/shop/default/build/assets/app-96ca2ca5.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/shop/default/build/assets/app-05f8acf7.css') }}" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        as="style">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap">
    <link rel='stylesheet' type='text/css' property='stylesheet'
        href='//localhost:8000/_debugbar/assets/stylesheets?v=1721647894&theme=auto' data-turbolinks-eval='false'
        data-turbo-eval='false'>
    <script src='//localhost:8000/_debugbar/assets/javascript?v=1721647894' data-turbolinks-eval='false'
        data-turbo-eval='false'></script>
    <script data-turbo-eval="false">
        jQuery.noConflict(true);
    </script>
</head>

<body>
    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        {!! view_render_event('bagisto.shop.customers.sign-up.logo.before') !!}

        <!-- Company Logo -->
        <div class="flex items-center gap-x-14 max-[1180px]:gap-x-9">
            <a href="{{ route('shop.home.index') }}" class="m-[0_auto_20px_auto]" aria-label="@lang('shop::app.customers.signup-form.bagisto')">
                <img src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                    alt="{{ config('app.name') }}" width="131" height="29">
            </a>
        </div>


        <!-- Form Container -->
        <div
            class="m-auto w-full max-w-[870px] rounded-xl border border-zinc-200 p-16 px-[90px] max-md:px-8 max-md:py-8 max-sm:border-none max-sm:p-0">
            <h1 class="font-dmserif text-4xl max-md:text-3xl max-sm:text-xl">
                @lang('shop::app.customers.signup-form.page-title')
            </h1>

            <p class="mt-4 text-xl text-zinc-500 max-sm:mt-0 max-sm:text-sm">
                @lang('shop::app.customers.signup-form.form-signup-text')
            </p>

            <div class="mt-14 rounded max-sm:mt-8">
                <form action="{{ route('admin.register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Name -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Nom et prénom
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="name" placeholder="Nom et prénom" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Email -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            @lang('shop::app.customers.signup-form.email')
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="email" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="email" placeholder="email@example.com" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Password -->
                    <x-shop::form.control-group class="mb-6">
                        <x-shop::form.control-group.label>
                            @lang('shop::app.customers.signup-form.password')
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="password" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="password" placeholder="Mot de passe" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Nom Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Nom du Société
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="nom_societe" placeholder="Nom du Société" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('nom_societe')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Adresse Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Adresse du siège de l'entreprise
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="adresse_societe" placeholder="Adresse du Société" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('adresse_societe')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- SIREN Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            SIREN de l'entreprise
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="number" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="siren_societe" placeholder="SIREN du Société" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('siren_societe')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Site Web Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Site web
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="site_web" placeholder="Site web" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('site_web')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Téléphone Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Téléphone du contact principal
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="contact_telephone" placeholder="Téléphone du contact principal" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('contact_telephone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Téléphone Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Nom du contact principal
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="contact_nom" placeholder="Nom du contact principal" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('contact_nom')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Téléphone Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Prénom du contact principal
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="contact_prenom" placeholder="Prénom du contact principal" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('contact_prenom')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Téléphone Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Fonction du contact principal
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="text" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="contact_fonction" placeholder=" Fonction du contact principal" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('contact_fonction')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- contact fonction -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Email du contact principal
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="email" class="required px-6 py-4 max-md:py-3 max-sm:py-2" name="contact_email" placeholder="Email du contact principal" aria-required="true" />
                    </x-shop::form.control-group>
                    @error('contact_email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Logo Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Logo
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required type="file" class="px-6 py-4 max-md:py-3 max-sm:py-2" name="logo" />
                    </x-shop::form.control-group>
                    @error('logo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Description Société -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            Présentez votre entreprises en quelques lignes
                        </x-shop::form.control-group.label>
                        <x-shop::form.control-group.control required as="textarea" rows="4" class="px-6 py-4 max-md:py-3 max-sm:py-2" name="description" placeholder="Présentez votre entreprises en quelques lignes" aria-required="true"></x-shop::form.control-group.control>

                    </x-shop::form.control-group>
                    @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <!-- Save Button -->
                    <div class="flex items-center gap-x-2.5">
                        <button type="submit" class="primary-button block w-full max-w-[360px] m-auto">
                            Registre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
