<?php

use App\Http\Controllers\Petugas\LaporanRetensiController;
use Illuminate\Support\Facades\Route;

Route::get('/laporan-retensi', [LaporanRetensiController::class, 'index'])->name('laporanRetensi');
Route::get('/laporan-retensi/download', [LaporanRetensiController::class, 'download'])->name('downloadLaporanRetensi');