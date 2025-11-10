<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GSN Admin Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the GSNServiceProvider and handle
| GSN-specific functionality for the admin panel.
|
*/

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url')], function () {
    // Add your admin-specific GSN routes here
    // Example: Company/Societe management routes can be added here if needed
});
