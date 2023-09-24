<?php

use App\Http\Controllers\Petugas\StatistikRetensiController;
use Illuminate\Support\Facades\Route;

Route::get('/statistik-retensi', [StatistikRetensiController::class, 'index'])->name('statistikRetensi');
Route::post('/statistik-retensi/store', [StatistikRetensiController::class, 'store'])->name('storeStatistikRetensi');
Route::put('/statistik-retensi/update/{id}', [StatistikRetensiController::class, 'update'])->name('updateStatistikRetensi');
Route::delete('/statistik-retensi/delete/{id}', [StatistikRetensiController::class, 'delete'])->name('deleteStatistikRetensi');