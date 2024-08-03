<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\AnggotaController;

Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::resource('/peminjaman', PeminjamanController::class);
    Route::resource('/sanksi', SanksiController::class);
    Route::resource('/anggota', AnggotaController::class);
});

Route::middleware(['auth', 'role:pustakawan'])->group(function () {
    Route::resource('/buku', BukuController::class);
    Route::resource('/rak', RakController::class);
    Route::resource('/penulis', PenulisController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Include auth routes
require __DIR__.'/auth.php';
