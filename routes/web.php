<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'], fn() => redirect()->route('rumah-sakit.index'))->name('home');

    Route::resource('rumah-sakit', RumahSakitController::class);
    Route::delete('/rumah-sakit-delete/{id}', [RumahSakitController::class, 'destroyAjax'])->name('rumah-sakit.destroy-ajax');

    Route::resource('pasien', PasienController::class);
    Route::get('filter-pasien/{rumah_sakit_id?}', [PasienController::class, 'filter']);
    Route::delete('pasien-delete/{id}', [PasienController::class, 'destroyAjax']);
});
