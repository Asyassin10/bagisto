<?php

use Illuminate\Support\Facades\Route;
use Webkul\GSN\Http\Controllers\Admin\Societe\SocieteController;
use Webkul\GSN\Http\Controllers\Admin\Societe\AdminSocieteController;
use Webkul\GSN\Http\Controllers\Admin\TinyMCEController;
use Webkul\GSN\Http\Controllers\Admin\EmailsCsvController;

/*
|--------------------------------------------------------------------------
| GSN Admin Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the GSNServiceProvider and handle
| GSN-specific functionality for the admin panel.
|
*/

Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {

    /**
     * Societe routes (regular admin)
     */
    Route::get('/societe', [SocieteController::class, 'index'])->name('admin.societe.index');
    Route::post('/societe/update', [SocieteController::class, 'update'])->name('admin.societe.update');

    /**
     * Societe routes (super admin)
     */
    Route::get('/societes', [AdminSocieteController::class, 'index'])->name("admin::societe-admin.index");
    Route::get('/societes/edit/{id}', [AdminSocieteController::class, 'edit'])->name("admin::societe.societe.edit");
    Route::get('/societes/show/{id}', [AdminSocieteController::class, 'show'])->name('admin::societe.societe.show');
    Route::post('/societes/update/{id}', [AdminSocieteController::class, 'update'])->name("admin::societe.societe.update");
    Route::delete('/societes/delete/{societe_id}', [AdminSocieteController::class, 'deleteSociete'])->name("admin::societe.societe.delete");
    Route::delete('/societes/toggleSetIsCongratePartner/{societe_id}', [AdminSocieteController::class, 'toggleSetIsCongratePartner'])->name("admin::societe.societe.toggleSetIsCongratePartner");
    Route::post('/societes/bulk-set-partner', [AdminSocieteController::class, 'bulkSetPartner'])->name('admin::societe.societe.bulkSetPartner');

    /**
     * TinyMCE file upload handler
     */
    Route::post('tinymce/upload', [TinyMCEController::class, 'upload'])->name('admin.tinymce.upload');

    /**
     * Email CSV import (Editor account creation)
     */
    Route::post("postCsv", [EmailsCsvController::class, "postCsv"])->name("admin.editeur.import");
});
