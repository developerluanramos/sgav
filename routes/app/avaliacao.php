<?php 

Route::get('avaliacao/{cicloAvaliativoUuid}/{vinculoUuid}/create', [\App\Http\Controllers\App\Avaliacao\AvaliacaoCreateController::class, 'create'])->name('avaliacao.create');
// Route::post('avaliador', [\App\Http\Controllers\App\Avaliador\AvaliadorStoreController::class, 'store'])->name('avaliador.store');
// Route::get('avaliador', [\App\Http\Controllers\App\Avaliador\AvaliadorIndexController::class, 'index'])->name('avaliador.index');
// Route::get('avaliador/{uuid}/show', [\App\Http\Controllers\App\Avaliador\AvaliadorShowController::class, 'show'])->name('avaliador.show');
// Route::get('avaliador/{uuid}/edit', [\App\Http\Controllers\App\Avaliador\AvaliadorEditController::class, 'edit'])->name('avaliador.edit');
// Route::put('avaliador/{uuid}/update', [\App\Http\Controllers\App\Avaliador\AvaliadorUpdateController::class, 'update'])->name('avaliador.update');