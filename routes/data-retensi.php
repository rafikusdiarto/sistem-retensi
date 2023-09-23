<?php

use App\Http\Controllers\Petugas\DataRetensiController;
use Illuminate\Support\Facades\Route;

Route::get('/dataretensi', [DataRetensiController::class, 'index'])->name('dataRetensi');
Route::post('/dataretensi/print', [DataRetensiController::class, 'print'])->name('printDataRetensi');
