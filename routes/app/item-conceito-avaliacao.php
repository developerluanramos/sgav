<?php

Route::delete('item-conceito-avaliacao/{uuid}', [\App\Http\Controllers\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoDeleteController::class, 'delete'])->name('item-conceito-avaliacao.delete');
Route::put('item-conceito-avaliacao/{uuid}/update', [\App\Http\Controllers\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateController::class, 'update'])->name('item-conceito-avaliacao.update');

