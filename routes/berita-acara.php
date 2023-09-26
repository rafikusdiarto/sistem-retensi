<?php

use App\Http\Controllers\Petugas\BeritaAcaraPetugasController;
use Illuminate\Support\Facades\Route;

Route::get('/berita-acara', [BeritaAcaraPetugasController::class, 'index'])->name('beritaAcara');
Route::get('/berita-acara/create', [BeritaAcaraPetugasController::class, 'create'])->name('tambahDataBeritaAcara');
Route::post('/berita-acara/store', [BeritaAcaraPetugasController::class, 'store'])->name('storeBeritaAcara');
Route::get('/berita-acara/edit/{id}', [BeritaAcaraPetugasController::class, 'edit'])->name('editBeritaAcara');
Route::put('/berita-acara/update/{id}', [BeritaAcaraPetugasController::class, 'update'])->name('updateBeritaAcara');
Route::delete('/berita-acara/delete/{id}', [BeritaAcaraPetugasController::class, 'delete'])->name('deleteBeritaAcara');
Route::get('/berita-acara/download/{file}', [BeritaAcaraPetugasController::class, 'download'])->name('downloadBeritaAcara');