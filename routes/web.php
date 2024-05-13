<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/penulis',\App\Http\Controllers\PenulisController::class);
Route::resource('/rak',\App\Http\Controllers\RakController::class);
Route::resource('/buku',\App\Http\Controllers\BukuController::class);