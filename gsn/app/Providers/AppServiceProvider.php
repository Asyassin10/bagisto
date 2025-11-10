<?php

namespace App\Providers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\ParallelTesting;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Predis\Connection\ConnectionException;
use Subfission\Cas\Facades\Cas;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        ParallelTesting::setUpTestDatabase(function (string $database, int $token) {
            Artisan::call('db:seed');
        });
        // this need to be uncommented because it is important for the staging env and this is a backup
       # URL::forceScheme('https');
        try {
            Redis::connection()->ping();
            config(['cache.default' => 'redis']);
            config(['session.driver' => 'redis']);
        } catch (ConnectionException $e) {
            config(['cache.default' => 'file']);
            config(['session.driver' => 'file']);
        }
        $is_logged = env(key: 'IS_SQL_LOGGED', default: false);
        if ($is_logged && $is_logged == true) {
            DB::listen(function ($query) {
                // Format the SQL query with bindings
                $sqlWithBindings = $this->replaceBindings($query->sql, $query->bindings);

                // Log to the custom 'justSql' channel
                Log::channel(channel: 'justSql')->info(message: $sqlWithBindings);
            });
        }
    }
    protected function replaceBindings($sql, $bindings)
    {
        foreach ($bindings as $binding) {
            // If the binding is a string, escape it with quotes
            $binding = is_numeric($binding) ? $binding : "'" . addslashes($binding) . "'";
            // Replace the first occurrence of '?' in the SQL with the binding
            $sql = preg_replace('/\?/', $binding, $sql, 1);
        }

        return $sql;
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $allowedIPs = array_map('trim', explode(',', config('app.debug_allowed_ips')));

        $allowedIPs = array_filter($allowedIPs);

        if (empty($allowedIPs)) {
            return;
        }

        if (in_array(Request::ip(), $allowedIPs)) {
            Debugbar::enable();
        } else {
            Debugbar::disable();
        }
    }
}
