<?php

namespace Webkul\GSN\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    /**
     * The models to register.
     *
     * @var array
     */
    protected $models = [
        // Models are not registered with Concord proxies
    ];
}
