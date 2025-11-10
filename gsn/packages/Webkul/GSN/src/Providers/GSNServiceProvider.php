<?php

namespace Webkul\GSN\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }

        // Publish configuration
        $this->publishes([
            __DIR__.'/../Config/imagecache.php' => config_path('imagecache.php'),
        ], 'gsn-config');

        // Publish theme assets
        $this->publishes([
            __DIR__.'/../Resources/assets' => public_path('themes/gsn'),
        ], 'gsn-assets');

        // Publish theme views
        $this->publishes([
            __DIR__.'/../Resources/views/shop' => resource_path('themes/gsn/views'),
        ], 'gsn-views');
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

        // Register services
        $this->app->singleton(\Webkul\GSN\Services\LogicService::class, function ($app) {
            return new \Webkul\GSN\Services\LogicService();
        });

        $this->app->singleton(\Webkul\GSN\Services\ApiService::class, function ($app) {
            return new \Webkul\GSN\Services\ApiService();
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
