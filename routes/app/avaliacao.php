<?php

Route::get('avaliacao/{cicloAvaliativoUuid}/{vinculoUuid}/create', [\App\Http\Controllers\App\VinculoAvaliacao\VinculoAvaliacaoCreateController::class, 'create'])->name('avaliacao.create');
Route::post('avaliacao/{cicloAvaliativoUuid}/{vinculoUuid}/store', [\App\Http\Controllers\App\VinculoAvaliacao\VinculoAvaliacaoStoreController::class, 'store'])->name('avaliacao.store');
Route::get('avaliacao/{cicloAvaliativoUuid}/{vinculoUuid}/show', [\App\Http\Controllers\App\VinculoAvaliacao\VinculoAvaliacaoShowController::class, 'show'])->name('avaliacao.show');
