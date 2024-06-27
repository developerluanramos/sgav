<?php

Route::get('vinculo/create', [\App\Http\Controllers\App\Vinculo\VinculoCreateController::class, 'create'])->name('vinculo.create');
Route::post('vinculo/', [App\Http\Controllers\App\Vinculo\VinculoStoreController::class, 'store'])->name('vinculo.store');
Route::get('vinculo/', [App\Http\Controllers\App\Vinculo\VinculoIndexController::class, 'index'])->name('vinculo.index');
Route::get('/vinculo/edit/{vinculo}', [\App\Http\Controllers\App\Vinculo\VinculoEditController::class, 'edit'])->name('vinculo.edit');
Route::put('/vinculo/{vinculo}', [\App\Http\Controllers\App\Vinculo\VinculoUpdateController::class, 'update'])->name('vinculo.update');
Route::delete('vinculo/{uuid}', [\App\Http\Controllers\App\Vinculo\VinculoDeleteController::class, 'delete'])->name('vinculo.delete');
