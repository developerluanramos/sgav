<?php

Route::post('indicador-desempenho/', [\App\Http\Controllers\App\IndicadorDesempenho\IndicadorDesempenhoStoreController::class, 'store'])->name('indicador-desempenho.store');
