<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\SopRetensiController;

Route::get('/sop-retensi',[SopRetensiController::class,'index'])->name('sopRetensi');
Route::post('/sop-retensi/store', [SopRetensiController::class, 'store'])->name('storeSopRetensi');
Route::get('/sop-retensi/download/{file}', [SopRetensiController::class, 'download'])->name('downloadSopRetensi');
Route::delete('/sop-retensi/delete/{id}', [SopRetensiController::class, 'delete'])->name('deleteSopRetensi');
