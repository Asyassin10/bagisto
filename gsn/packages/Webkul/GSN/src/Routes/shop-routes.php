<?php

use Illuminate\Support\Facades\Route;
use Webkul\GSN\Http\Controllers\AuthController;
use Webkul\GSN\Http\Controllers\ChatbotController;
use Webkul\GSN\Http\Controllers\JsonSearchController;
use Webkul\GSN\Http\Controllers\Shop\HomeController;
use Webkul\GSN\Http\Controllers\Shop\ProductsCategoriesProxyController;
use Webkul\GSN\Http\Controllers\Shop\API\ProductController as APIProductController;
use Webkul\GSN\Http\Controllers\Shop\API\CategoryController as APICategoryController;
use Webkul\GSN\Http\Controllers\Shop\API\CompareController as APICompareController;

/*
|--------------------------------------------------------------------------
| GSN Shop Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the GSNServiceProvider and handle
| GSN-specific functionality for the shop frontend.
|
*/

// CAS Authentication Routes
Route::get('/cas/login', [AuthController::class, 'login'])->name('login');
Route::get('/cas/logout', [AuthController::class, 'logout'])->name('gsn.cas.logout');
Route::get('/cas/callback', [AuthController::class, 'handleCasCallback'])->name('gsn.cas.callback');

// Chatbot Routes
Route::get('/ollama', [ChatbotController::class, 'chatbot'])->name('gsn.chatbot');

// GSN API Routes (Override Core Shop API Routes)
Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix' => 'api'], function () {

    /**
     * Category API Routes (with custom filters)
     */
    Route::controller(APICategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('shop.api.categories.index');
        Route::get('tree', 'tree')->name('shop.api.categories.tree');
        Route::get('attributes', 'getAttributes')->name('shop.api.categories.attributes');
        Route::get('max-price/{id?}', 'getProductMaxPrice')->name('shop.api.categories.max_price');
    });

    /**
     * Product API Routes (with is_valid_by_admin and is_congrate_partner filters)
     */
    Route::controller(APIProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('shop.api.products.index');
        Route::get('{id}/related', 'relatedProducts')->name('shop.api.products.related.index');
        Route::get('{id}/up-sell', 'upSellProducts')->name('shop.api.products.up-sell.index');
    });

    /**
     * Compare API Routes (with custom filters)
     */
    Route::controller(APICompareController::class)->prefix('compare-items')->group(function () {
        Route::get('', 'index')->name('shop.api.compare.index');
        Route::get('/getComparableAttributes', 'getComparableAttributes')->name('shop.api.compare.getComparableAttributes');
        Route::post('products-comparee-new', 'get_products_new')->name('getproducts_new');
        Route::post('', 'store')->name('shop.api.compare.store');
        Route::delete('', 'destroy')->name('shop.api.compare.destroy');
        Route::get('/products-no-compare', 'getnoncompareyet')->name('shop.api.compare.products-no-compare');
        Route::delete('all', 'destroyAll')->name('shop.api.compare.destroy_all');
        Route::post('products-compare', 'get_products')->name('shop.api.compare.getproducts');
    });

    // Smart Search API Routes
    Route::get('/smart-search', [JsonSearchController::class, 'search'])->name('gsn.api.smart-search');
    Route::get('/test-search', [JsonSearchController::class, 'testSearch'])->name('gsn.api.test-search');
});

// GSN Storefront Routes (Override Core Shop Routes)
Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {

    /**
     * Home page (with custom product filtering)
     */
    Route::get('/', [HomeController::class, 'index'])
        ->name('shop.home.index')
        ->middleware('cacheResponse');

    Route::get('contact-us', [HomeController::class, 'contactUs'])
        ->name('shop.home.contact_us')
        ->middleware('cacheResponse');

    Route::post('contact-us/send-mail', [HomeController::class, 'sendContactUsMail'])
        ->name('shop.home.contact_us.send_mail')
        ->middleware('cacheResponse');

    /**
     * Fallback route for products and categories (with custom logic)
     */
    Route::fallback([ProductsCategoriesProxyController::class, 'index'])
        ->name('shop.product_or_category.index');
});

// Legal Documents
Route::get('/mentions-legales', function () {
    $filePath = public_path('documents/MentionsLegales_GuideDesSolutionsNumeriques.pdf');

    if (file_exists($filePath)) {
        return \Illuminate\Support\Facades\Response::file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="MentionsLegales_GuideDesSolutionsNumeriques.pdf"',
        ]);
    }

    abort(404, 'Document not found');
})->name('gsn.mentions-legales');
