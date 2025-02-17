<?php 

Route::get('avaliacao/{cicloAvaliativoUuid}/{vinculoUuid}/create', [\App\Http\Controllers\App\VinculoAvaliacao\VinculoAvaliacaoCreateController::class, 'create'])->name('avaliacao.create');
Route::post('avaliacao/{cicloAvaliativoUuid}/{vinculoUuid}/store', [\App\Http\Controllers\App\VinculoAvaliacao\VinculoAvaliacaoStoreController::class, 'store'])->name('avaliacao.store');