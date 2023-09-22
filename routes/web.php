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
Route::get('/datapetugas', [DataPetugasController::class, 'index'])->name('dataPetugas');
Route::get('/datapetugas/tambahdatapetugas', [DataPetugasController::class, 'add'])->name('tambahDataPetugas');
Route::post('/storedatapetugas', [DataPetugasController::class, 'store'])->name('storeDataPetugas');
Route::get('/datapetugas/editdatapetugas/{id}', [DataPetugasController::class, 'edit'])->name('editDataPetugas');
Route::put('/updatedatapetugas/{id}', [DataPetugasController::class, 'update'])->name('updateDataPetugas');
Route::delete('/deletedatapetugas/{id}', [DataPetugasController::class, 'delete'])->name('deleteDataPetugas');
Route::get('/datarekammedis', [DataRekamMedisController::class, 'index'])->name('dataRekamMedis');
Route::get('/datarekammedis/tambahdatarekammedis', [DataRekamMedisController::class, 'add'])->name('tambahDataRekamMedis');
Route::post('/storedatarekammedis', [DataRekamMedisController::class, 'store'])->name('storeDataRekamMedis');
Route::get('/datarekammedis/editdatarekammedis/{id}', [DataRekamMedisController::class, 'edit'])->name('editDataRekamMedis');
Route::put('/updatedatarekammedis/{id}', [DataRekamMedisController::class, 'update'])->name('updateDataRekamMedis');
Route::post('/retensidatarekammedis', [DataRekamMedisController::class, 'changeStatus'])->name('retensi');
Route::delete('/deletedatarekammedis/{id}', [DataRekamMedisController::class, 'delete'])->name('deleteDataRekamMedis');
Route::get('/searchdatarekammedis', [DataRekamMedisController::class, 'search'])->name('searchDataRekamMedis');
Route::get('/dataretensi', [DataRetensiController::class, 'index'])->name('dataRetensi');
Route::post('/dataretensi/print', [DataRetensiController::class, 'print'])->name('printDataRetensi');

Route::post('/uploadfile', [DataRekamMedisController::class, 'importFile'])->name('importFile');


Route::get('/dashboard-kepala', [DashboardKepalaController::class, 'index'])->name('dashboardKepala');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/berita-acara.php';
