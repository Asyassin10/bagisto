<?php

use Illuminate\Support\Facades\Route;
use Webkul\GSN\Http\Controllers\AuthController;
use Webkul\GSN\Http\Controllers\ChatbotController;
use Webkul\GSN\Http\Controllers\JsonSearchController;

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
Route::get('/cas/login', [AuthController::class, 'login'])->name('gsn.cas.login');
Route::get('/cas/logout', [AuthController::class, 'logout'])->name('gsn.cas.logout');
Route::get('/cas/callback', [AuthController::class, 'handleCasCallback'])->name('gsn.cas.callback');

// Chatbot Routes
Route::get('/ollama', [ChatbotController::class, 'chatbot'])->name('gsn.chatbot');

// API Routes for Smart Search
Route::prefix('api')->group(function () {
    Route::get('/smart-search', [JsonSearchController::class, 'search'])->name('gsn.api.smart-search');
    Route::get('/test-search', [JsonSearchController::class, 'testSearch'])->name('gsn.api.test-search');
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
