<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\ArsipRekamMedisController;

Route::get('/arsip-rm',[ArsipRekamMedisController::class,'index'])->name('arsipRekamMedis');
Route::get('/arsip-rm/create',[ArsipRekamMedisController::class,'add'])->name('tambahDataArsip');
Route::get('/arsip-rm/edit/{id}',[ArsipRekamMedisController::class,'edit'])->name('editDataArsip');
Route::put('/arsip-rm/update/{id}',[ArsipRekamMedisController::class,'update'])->name('updateDataArsip');
Route::post('/arsip-rm/store', [ArsipRekamMedisController::class, 'store'])->name('storeArsip');
Route::get('/arsip-rm/download/{file}', [ArsipRekamMedisController::class, 'download'])->name('downloadArsip');
Route::delete('/arsip-rm/delete/{id}', [ArsipRekamMedisController::class, 'delete'])->name('deleteArsip');
Route::get('/lampiran/arsip-rm/delete/{id}', [ArsipRekamMedisController::class, 'deleteFileArsip'])->name('deleteLampiranArsip');
