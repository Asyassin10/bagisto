<?php

namespace Webkul\GSN\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

class GSNServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin-routes.php');
        $this->loadRoutesFrom(__DIR__.'/../Routes/shop-routes.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        // Load Shop migrations (core Shop functionality)
        $shopMigrationsPath = base_path('packages/Webkul/Shop/src/Database/Migrations');
        if (is_dir($shopMigrationsPath)) {
            $this->loadMigrationsFrom($shopMigrationsPath);
        }

        // Load views - GSN views can override Shop and Admin views
        // Register GSN-specific views with 'gsn' namespace
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'gsn');

        // Override Shop package views - these will take priority
        if (is_dir(__DIR__.'/../Resources/views/shop')) {
            $this->loadViewsFrom(__DIR__.'/../Resources/views/shop', 'shop');
        }

        // Override Admin package views - these will take priority
        if (is_dir(__DIR__.'/../Resources/views/admin')) {
            $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'admin');
        }

        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'gsn');

        // Load Shop translations and views (core Shop functionality)
        $shopViewsPath = base_path('packages/Webkul/Shop/src/Resources/views');
        $shopLangPath = base_path('packages/Webkul/Shop/src/Resources/lang');

        if (is_dir($shopViewsPath)) {
            $this->loadViewsFrom($shopViewsPath, 'shop');
        }

        if (is_dir($shopLangPath)) {
            $this->loadTranslationsFrom($shopLangPath, 'shop');
        }

        // Register middleware
        $this->registerMiddleware();

        // Configure Paginator views (needed for Shop functionality)
        \Illuminate\Pagination\Paginator::defaultView('shop::partials.pagination');
        \Illuminate\Pagination\Paginator::defaultSimpleView('shop::partials.pagination');

        // Register Shop Event Service Provider
        $shopEventProvider = 'Webkul\\Shop\\Providers\\EventServiceProvider';
        if (class_exists($shopEventProvider)) {
            $this->app->register($shopEventProvider);
        }

        // Load Shop breadcrumbs
        $shopBreadcrumbsPath = base_path('packages/Webkul/Shop/src/Routes/breadcrumbs.php');
        if (file_exists($shopBreadcrumbsPath)) {
            require $shopBreadcrumbsPath;
        }

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }

        // Publish configuration
        $this->publishes([
            __DIR__.'/../Config/imagecache.php' => config_path('imagecache.php'),
        ], 'gsn-config');

        // Publish Shop imagecache config
        $shopImagecachePath = base_path('packages/Webkul/Shop/src/Config/imagecache.php');
        if (file_exists($shopImagecachePath)) {
            $this->publishes([
                $shopImagecachePath => config_path('imagecache.php'),
            ], 'shop-config');
        }

        // Publish custom CSS/JS assets
        $this->publishes([
            __DIR__.'/../Resources/assets/css' => public_path('css/gsn'),
        ], 'gsn-css');

        $this->publishes([
            __DIR__.'/../Resources/assets/js' => public_path('js/gsn'),
        ], 'gsn-js');

        // Publish tarteaucitron (cookie consent library)
        $this->publishes([
            __DIR__.'/../Resources/assets/tarteaucitron' => public_path('tarteaucitron'),
        ], 'gsn-tarteaucitron');

        // Publish all theme assets
        $this->publishes([
            __DIR__.'/../Resources/assets' => public_path('themes/gsn'),
        ], 'gsn-assets');

        // Publish theme views
        $this->publishes([
            __DIR__.'/../Resources/views/shop' => resource_path('themes/gsn/views'),
        ], 'gsn-views');
    }

    /**
     * Register middleware.
     *
     * @return void
     */
    protected function registerMiddleware(): void
    {
        $router = $this->app->make(Router::class);

        // Register GSN custom middleware
        $router->aliasMiddleware('cas.auth', \Webkul\GSN\Http\Middleware\CasAuth::class);

        // Register Shop middleware (so we don't need core ShopServiceProvider)
        $router->aliasMiddleware('currency', \Webkul\Shop\Http\Middleware\Currency::class);
        $router->aliasMiddleware('locale', \Webkul\Shop\Http\Middleware\Locale::class);
        $router->aliasMiddleware('customer', \Webkul\Shop\Http\Middleware\AuthenticateCustomer::class);
        $router->aliasMiddleware('theme', \Webkul\Shop\Http\Middleware\Theme::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Register config
        $this->mergeConfigFrom(
            __DIR__.'/../Config/imagecache.php',
            'imagecache'
        );

        // Merge Shop customer menu config
        $shopConfigPath = base_path('packages/Webkul/Shop/src/Config/menu.php');
        if (file_exists($shopConfigPath)) {
            $this->mergeConfigFrom($shopConfigPath, 'menu.customer');
        }

        // Register GSN services
        $this->app->singleton(\Webkul\GSN\Services\LogicService::class, function ($app) {
            return new \Webkul\GSN\Services\LogicService();
        });

        $this->app->singleton(\Webkul\GSN\Services\ApiService::class, function ($app) {
            return new \Webkul\GSN\Services\ApiService();
        });

        // Register Shop services (needed for Shop functionality)
        $this->app->singleton(\Webkul\Shop\Services\ProductPageService::class, function ($app) {
            return new \Webkul\Shop\Services\ProductPageService();
        });
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        $commands = [];

        $commandFiles = [
            'ScanProject',
            'SyncData',
            'DbSeedProducts',
            'SetAdminPwsds',
        ];

        foreach ($commandFiles as $command) {
            $class = "Webkul\\GSN\\Console\\Commands\\{$command}";
            if (class_exists($class)) {
                $commands[] = $class;
            }
        }

        if (!empty($commands)) {
            $this->commands($commands);
        }
    }
}
