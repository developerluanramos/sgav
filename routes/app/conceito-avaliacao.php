<?php

Route::get('conceito-avaliacao/create', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoCreateController::class, 'create'])->name('conceito-avaliacao.create');
Route::post('conceito-avaliacao', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoStoreController::class, 'store'])->name('conceito-avaliacao.store');
Route::get('conceito-avaliacao', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoIndexController::class, 'index'])->name('conceito-avaliacao.index');
Route::get('conceito-avaliacao/{uuid}/show', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoShowController::class, 'show'])->name('conceito-avaliacao.show');
Route::get('conceito-avaliacao/{uuid}/edit', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoEditController::class, 'edit'])->name('conceito-avaliacao.edit');
Route::put('conceito-avaliacao/{uuid}/update', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoUpdateController::class, 'update'])->name('conceito-avaliacao.update');

