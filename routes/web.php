<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController; // <-- Harus mengimpor Controller Anda

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan route web untuk aplikasi Anda.
| Route ini dimuat oleh RouteServiceProvider dalam grup yang
| berisi grup middleware "web". Sekarang buat sesuatu yang hebat!
|
*/

// Route utama untuk halaman CV
// Menunjuk ke class CvController dan method index
Route::get('/', [CvController::class, 'index'])->name('cv.home');