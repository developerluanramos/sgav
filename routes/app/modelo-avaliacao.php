<?php

Route::get('modelo-avaliacao/create', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoCreateController::class, 'create'])->name('modelo-avaliacao.create');
Route::post('modelo-avaliacao', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoStoreController::class, 'store'])->name('modelo-avaliacao.store');
Route::get('modelo-avaliacao', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoIndexController::class, 'index'])->name('modelo-avaliacao.index');
Route::get('modelo-avaliacao/{uuid}/show', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoShowController::class, 'show'])->name('modelo-avaliacao.show');
Route::get('modelo-avaliacao/{uuid}/edit', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoEditController::class, 'edit'])->name('modelo-avaliacao.edit');
Route::put('modelo-avaliacao/{uuid}/update', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoUpdateController::class, 'update'])->name('modelo-avaliacao.update');

