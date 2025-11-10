<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Societe\SocieteController;
use Webkul\Admin\Http\Controllers\Societe\AdminSocieteController;




Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::get('/societe', [SocieteController::class, 'index'])->name('admin.societe.index');
    Route::post('/societe/update', [SocieteController::class, 'update'])->name('admin.societe.update');
});

Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::get('/societes', [AdminSocieteController::class, 'index'])->name("admin::societe-admin.index");
    Route::get('/societes/edit/{id}', [AdminSocieteController::class, 'edit'])->name("admin::societe.societe.edit");
    Route::get('/societes/show/{id}', [AdminSocieteController::class, 'show'])->name('admin::societe.societe.show');
    Route::post('/societes/update/{id}', [AdminSocieteController::class, 'update'])->name("admin::societe.societe.update");
    Route::delete('/societes/delete/{societe_id}', [AdminSocieteController::class, 'deleteSociete'])->name("admin::societe.societe.delete");
    Route::delete('/societes/toggleSetIsCongratePartner/{societe_id}', [AdminSocieteController::class, 'toggleSetIsCongratePartner'])->name("admin::societe.societe.toggleSetIsCongratePartner");
    Route::post('/societes/bulk-set-partner', [AdminSocieteController::class, 'bulkSetPartner'])->name('admin::societe.societe.bulkSetPartner');
});
