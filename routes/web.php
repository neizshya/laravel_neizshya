<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn() => redirect()->route('rumah-sakit.index'));

    Route::resource('rumah-sakit', RumahSakitController::class);
    Route::resource('pasien', PasienController::class);

    Route::get('filter-pasien/{rumah_sakit_id?}', [PasienController::class, 'filter']);
    Route::delete('pasien-delete/{id}', [PasienController::class, 'destroyAjax']);
});
