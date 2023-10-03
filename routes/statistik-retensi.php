<?php

use App\Http\Controllers\Petugas\StatistikRetensiController;
use Illuminate\Support\Facades\Route;

Route::get('/statistik-retensi', [StatistikRetensiController::class, 'index'])->name('statistikRetensi');
Route::post('/statistik-retensi/store', [StatistikRetensiController::class, 'store'])->name('storeStatistikRetensi');
Route::put('/statistik-retensi/update/{id}', [StatistikRetensiController::class, 'update'])->name('updateStatistikRetensi');
Route::delete('/statistik-retensi/delete/{id}', [StatistikRetensiController::class, 'delete'])->name('deleteStatistikRetensi');

Route::get('/kepala/statistik-retensi', [App\Http\Controllers\Kepala\StatistikRetensiController::class, 'index']);
Route::post('/kepala/statistik-retensi/store', [App\Http\Controllers\Kepala\StatistikRetensiController::class, 'store']);
Route::put('/kepala/statistik-retensi/update/{id}', [App\Http\Controllers\Kepala\StatistikRetensiController::class, 'update']);
Route::delete('/kepala/statistik-retensi/delete/{id}', [App\Http\Controllers\Kepala\StatistikRetensiController::class, 'delete']);


