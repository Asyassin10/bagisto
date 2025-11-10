<?php

use App\Notifications\CustomApiNotification;
use Illuminate\Support\Facades\Notification;
use Webkul\User\Models\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use App\Notifications\AdminVerifyEmailNotification;
use Illuminate\Http\Request;
use Subfission\Cas\Facades\Cas;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
 use Illuminate\Support\Facades\Response;
use Webkul\Category\Repositories\CategoryRepository;
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

Route::get('/cas/login', [AuthController::class, 'login'])->name('login');
Route::get('/cas/logout', [AuthController::class, 'logout'])->name('logout.cas');
Route::get('/cas/callback', [AuthController::class, 'handleCasCallback'])->name('cas.callback');


Route::get('/test/cas', function () {
    // Check if the user is authenticated with CAS
    if (Cas::isAuthenticated()) {
        $userAttributes = Cas::getAttributes(); // Retrieve CAS attributes

        // Extract the 'uniquecsoecid' attribute
        $uniquecsoecid = $userAttributes['uniquecsoecid'] ?? null;


        return dd($uniquecsoecid);
    } else {
        return "CAS authentication failed.";
    }
})->name('test')->middleware('cas.auth');




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

Route::get('/mentions-legales', function () {
    $filePath = public_path('documents/MentionsLegales_GuideDesSolutionsNumeriques.pdf');

    if (file_exists($filePath)) {
        return Response::file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="MentionsLegales_GuideDesSolutionsNumeriques.pdf"',
        ]);
    }

    abort(404, 'Document not found');
})->name('mentions-legales');

Route::get('/ollama', [ChatbotController::class, 'chatbot']);
Route::get('/category', [ProductsCategoriesProxyController::class, 'testCategory']);


 

 
