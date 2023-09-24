<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Petugas\DataRetensiController;
use App\Http\Controllers\Petugas\DataPetugasController;
use App\Http\Controllers\Kepala\DashboardKepalaController;
use App\Http\Controllers\Petugas\DataRekamMedisController;
use App\Http\Controllers\Petugas\DashboardPetugasController;
use App\Http\Controllers\Petugas\BeritaAcaraPetugasController;

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
    return view('auth.login');
});

Route::get('/redirect', [RedirectController::class, 'index']);

Route::get('/dashboard-petugas', [DashboardPetugasController::class, 'index'])->name('dashboardPetugas');

Route::get('/dashboard-kepala', [DashboardKepalaController::class, 'index'])->name('dashboardKepala');

require __DIR__ . '/auth.php';
require __DIR__ . '/berita-acara.php';
<<<<<<< HEAD
require __DIR__ . '/statistik-retensi.php';
=======
require __DIR__ . '/data-petugas.php';
require __DIR__ . '/data-rm.php';
require __DIR__ . '/data-retensi.php';
>>>>>>> bf0bef7e3666e3042d0ccdaaa284398067d83a4f
