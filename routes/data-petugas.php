<?php

use App\Http\Controllers\Petugas\DataPetugasController;
use Illuminate\Support\Facades\Route;

Route::get('/datapetugas', [DataPetugasController::class, 'index'])->name('dataPetugas');
Route::get('/datapetugas/tambahdatapetugas', [DataPetugasController::class, 'add'])->name('tambahDataPetugas');
Route::post('/storedatapetugas', [DataPetugasController::class, 'store'])->name('storeDataPetugas');
Route::get('/datapetugas/editdatapetugas/{id}', [DataPetugasController::class, 'edit'])->name('editDataPetugas');
Route::put('/updatedatapetugas/{id}', [DataPetugasController::class, 'update'])->name('updateDataPetugas');
Route::delete('/deletedatapetugas/{id}', [DataPetugasController::class, 'delete'])->name('deleteDataPetugas');
