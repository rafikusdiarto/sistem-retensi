<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Kepala\DashboardKepalaController;
use App\Http\Controllers\Petugas\DashboardPetugasController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
