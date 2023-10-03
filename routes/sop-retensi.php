<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\SopRetensiController;

Route::get('/sop-retensi',[SopRetensiController::class,'index'])->name('sopRetensi');
Route::post('/sop-retensi/store', [SopRetensiController::class, 'store'])->name('storeSopRetensi');
Route::get('/sop-retensi/download/{file}', [SopRetensiController::class, 'download'])->name('downloadSopRetensi');
Route::get('/sop-retensi/show/{filename}', [SopRetensiController::class, 'show'])->name('showSopRetensi');
Route::delete('/sop-retensi/delete/{id}', [SopRetensiController::class, 'delete'])->name('deleteSopRetensi');

Route::get('/kepala/sop-retensi', [App\Http\Controllers\Kepala\SopRetensiController::class, 'index']);
Route::post('/kepala/sop-retensi/store', [App\Http\Controllers\Kepala\SopRetensiController::class, 'store']);
Route::get('/kepala/sop-retensi/download/{file}', [App\Http\Controllers\Kepala\SopRetensiController::class, 'download']);
Route::get('/kepala/sop-retensi/show/{filename}', [App\Http\Controllers\Kepala\SopRetensiController::class, 'show']);
Route::delete('/kepala/sop-retensi/delete/{id}', [App\Http\Controllers\Kepala\SopRetensiController::class, 'delete']);




