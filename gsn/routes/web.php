<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Webkul\Shop\Http\Controllers\ProductsCategoriesProxyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/send-test-email', function () {
    \Illuminate\Support\Facades\Mail::to('test@example.com')->send(new \App\Mail\TestEmail());
    return 'Test email sent!';
});


/* Route::get('/test-env', function () {

    $envMailLink = env('ENV_MAIL_LINK');

    // Return the value as a JSON response
    return response()->json(['ENV_MAIL_LINK' => $envMailLink]);
});
Route::get('/test-env-mail', function () {

    $envMailLink = [
        "ENV_MAIL_LINK" => env("ENV_MAIL_LINK"),
        "TOKEN_CNOEC" => env("TOKEN_CNOEC"),
        "CREATION_EDITEUR_TEMPLATE_ID" => env("CREATION_EDITEUR_TEMPLATE_ID"),
        "APP_URL" => env("APP_URL"),
    ];

    // Return the value as a JSON response
    return response()->json($envMailLink);
}); */
Route::get('/clean-cache', function () {

    // Execute the optimize:clear command
    Artisan::call('optimize:clear');

    // Return a response indicating the cache has been cleared
    return response()->json(['message' => 'Optimization cache cleared successfully!']);
});

// CAS routes are now handled by GSN package




/* Route::get('/test-notif', function () {

    $admin = Admin::where('email', "zakaria.el-hosni@bti-advisory.com")->first();

    $admin->notify(instance: new AdminVerifyEmailNotification());

    return response()->json(['ENV_MAIL_LINK' => "appp"]);
}); */

Route::get('/test-load-redis-test', function () {
    $connection = config("cache.default");
    $sessionDriver = config("session.driver");
    return response()->json(["conn" => $connection, "sessionDriver" => $sessionDriver]);
});
Route::get('/opt', function () {
    Artisan::call("optimize:clear");
    Artisan::call("responsecache:clear");
    return "";
});
Route::get('/get-env', function () {

    return response()->json([
        'RESPONSE_CACHE_ENABLED' => env("RESPONSE_CACHE_ENABLED")
    ]);
});

// Mentions légales and chatbot routes are now handled by GSN package
Route::get('/category', [ProductsCategoriesProxyController::class, 'testCategory']);


 

 
