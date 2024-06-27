<?php

Route::get('servidor/show/{uuid}', [\App\Http\Controllers\App\Servidor\ServidorShowController::class, 'show'])->name('servidor.show');
Route::get('/servidor/create', [\App\Http\Controllers\App\Servidor\ServidorCreateController::class, 'create'])->name('servidor.create');
Route::put('/servidor/{servidor}', [\App\Http\Controllers\App\Servidor\ServidorUpdateController::class, 'update'])->name('servidor.update');
Route::get('/servidor', [\App\Http\Controllers\App\Servidor\ServidorIndexController::class, 'index'])->name('servidor.index');
Route::get('/servidor/edit/{servidor}', [\App\Http\Controllers\App\Servidor\ServidorEditController::class, 'edit'])->name('servidor.edit');
Route::post('/servidor', [\App\Http\Controllers\App\Servidor\ServidorStoreController::class, 'store'])->name('servidor.store');
