<?php

use App\Http\Controllers\Petugas\DataRetensiController;
use Illuminate\Support\Facades\Route;

Route::get('/dataretensi', [DataRetensiController::class, 'index'])->name('dataRetensi');
Route::get('/dataretensi/searchdataretensi', [DataRetensiController::class, 'search'])->name('searchDataRetensi');
Route::put('/dataretensi/update-status/{id}/{status}', [DataRetensiController::class, 'update'])->name('updateDataRetensi');
Route::post('/dataretensi/print', [DataRetensiController::class, 'print'])->name('printDataRetensi');
