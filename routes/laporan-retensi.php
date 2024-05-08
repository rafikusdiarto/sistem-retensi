<?php

use App\Http\Controllers\Petugas\LaporanRetensiController;
use Illuminate\Support\Facades\Route;

Route::get('/laporan-retensi', [LaporanRetensiController::class, 'index'])->name('laporanRetensi');
Route::get('/laporan-retensi/download/{tahun}', [LaporanRetensiController::class, 'download'])->name('downloadLaporanRetensi');
Route::get('/kepala/laporan-retensi', [App\Http\Controllers\Kepala\LaporanRetensiController::class, 'index']);
Route::get('/kepala/laporan-retensi/download/{tahun}', [App\Http\Controllers\Kepala\LaporanRetensiController::class, 'download']);

