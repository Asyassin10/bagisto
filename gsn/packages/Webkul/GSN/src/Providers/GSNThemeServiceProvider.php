<?php

namespace Webkul\GSN\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class GSNThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Register theme components with 'shop' namespace to override Shop package components
        // This must be loaded AFTER ShopServiceProvider to have priority
        $themePath = resource_path('themes/gsn_theme/views/components');

        if (is_dir($themePath)) {
            Blade::anonymousComponentPath($themePath, 'shop');
        }

        // Also register theme views with 'shop' namespace for named views
        $themeViewsPath = resource_path('themes/gsn_theme/views');

        if (is_dir($themeViewsPath)) {
            $this->loadViewsFrom($themeViewsPath, 'shop');
        }
    }
}
