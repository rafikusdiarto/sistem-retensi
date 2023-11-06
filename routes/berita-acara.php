<?php

use App\Http\Controllers\Petugas\BeritaAcaraPetugasController;
use Illuminate\Support\Facades\Route;

Route::get('/berita-acara', [BeritaAcaraPetugasController::class, 'index'])->name('beritaAcara');
Route::get('/berita-acara/create', [BeritaAcaraPetugasController::class, 'create'])->name('tambahDataBeritaAcara');
Route::post('/berita-acara/store', [BeritaAcaraPetugasController::class, 'store'])->name('storeBeritaAcara');
Route::get('/berita-acara/edit/{id}', [BeritaAcaraPetugasController::class, 'edit'])->name('editBeritaAcara');
Route::put('/berita-acara/update/{id}', [BeritaAcaraPetugasController::class, 'update'])->name('updateBeritaAcara');
Route::delete('/berita-acara/delete/{id}', [BeritaAcaraPetugasController::class, 'delete'])->name('deleteBeritaAcara');
Route::get('/lampiran-berita-acara/delete/{id}', [BeritaAcaraPetugasController::class, 'deleteLampiran']);
Route::get('/berita-acara/download/{file}', [BeritaAcaraPetugasController::class, 'download'])->name('downloadBeritaAcara');

Route::get('/kepala/berita-acara', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'index']);
Route::get('/kepala/berita-acara/create', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'create']);
Route::post('/kepala/berita-acara/store', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'store']);
Route::get('/kepala/berita-acara/edit/{id}', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'edit']);
Route::put('/kepala/berita-acara/update/{id}', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'update']);
Route::delete('/kepala/berita-acara/delete/{id}', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'delete']);
Route::get('/kepala/lampiran-berita-acara/delete/{id}', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'deleteLampiran']);
Route::get('/kepala/berita-acara/download/{file}', [App\Http\Controllers\Kepala\BeritaAcaraKepalaController::class, 'download']);
