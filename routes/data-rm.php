<?php

use App\Http\Controllers\Petugas\DataRekamMedisController;
use Illuminate\Support\Facades\Route;

Route::get('/datarekammedis', [DataRekamMedisController::class, 'index'])->name('dataRekamMedis');
Route::get('/datarekammedis/list', [DataRekamMedisController::class, 'getDataRM'])->name('getDataRM');
Route::get('/datarekammedis/tambahdatarekammedis', [DataRekamMedisController::class, 'add'])->name('tambahDataRekamMedis');
Route::post('/storedatarekammedis', [DataRekamMedisController::class, 'store'])->name('storeDataRekamMedis');
Route::get('/datarekammedis/editdatarekammedis/{id}', [DataRekamMedisController::class, 'edit'])->name('editDataRekamMedis');
Route::put('/updatedatarekammedis/{id}', [DataRekamMedisController::class, 'update'])->name('updateDataRekamMedis');
Route::post('/retensidatarekammedis', [DataRekamMedisController::class, 'changeStatus'])->name('retensi');
Route::get('/deletedatarekammedis/{id}', [DataRekamMedisController::class, 'delete'])->name('deleteDataRekamMedis');
Route::get('/datarekammedis/searchdatarekammedis', [DataRekamMedisController::class, 'search'])->name('searchDataRekamMedis');
Route::post('/uploadfile', [DataRekamMedisController::class, 'importFile'])->name('importFile');
Route::post('/uploadfile', [DataRekamMedisController::class, 'importFile'])->name('importFile');

