<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PemesananKamarStandarController;

use App\Http\Controllers\KamarStandarController;

Route::get('/kamar-standar/create', [KamarStandarController::class, 'create'])->name('kamar-standar.create');
Route::post('/kamar-standar', [KamarStandarController::class, 'store'])->name('kamar-standar.store');

Route::get('/pemesanan-kamar-standar', [PemesananKamarStandarController::class, 'index'])->name('pemesanan-kamar-standar.index');
Route::get('/pemesanan-kamar-standar/create', [PemesananKamarStandarController::class, 'create'])->name('pemesanan-kamar-standar.create');
Route::post('/pemesanan-kamar-standar', [PemesananKamarStandarController::class, 'store'])->name('pemesanan-kamar-standar.store');

Route::post('/pemesanan-kamar-standar/{id}/checkout', [PemesananKamarStandarController::class, 'checkout'])->name('pemesanan-kamar-standar.checkout');
