<?php

Route::post('fator-avaliacao/{modeloAvaliacaoUuid}', [\App\Http\Controllers\App\FatorAvaliacao\FatorAvaliacaoStoreController::class, 'store'])->name('fator-avaliacao.store');
Route::put('fator-avaliacao/{uuid}/update', [\App\Http\Controllers\App\FatorAvaliacao\FatorAvaliacaoUpdateController::class, 'update'])->name('fator-avaliacao.update');
Route::delete('fator-avaliacao/{uuid}', [\App\Http\Controllers\App\FatorAvaliacao\FatorAvaliacaoStoreController::class, 'destroy'])->name('fator-avaliacao.destroy');

