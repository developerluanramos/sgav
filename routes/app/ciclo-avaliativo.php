<?php

use App\Http\Controllers\App\Calculo\RegraPontuacaoCreateController;
use App\Http\Controllers\App\Calculo\RegraPontuacaoStoreController;
use App\Http\Controllers\App\CicloAvaliativoIncidencia\IncidenciaCreateController;
use App\Http\Controllers\App\CicloAvaliativoIncidencia\IncidenciaStoreController;
use App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoCreateController;
use App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreController;

Route::prefix('ciclo-avaliativo')->group(function () {


    Route::get('', [\App\Http\Controllers\App\CicloAvaliativo\CicloAvaliativoIndexController::class, 'index'])->name('ciclo-avaliativo.index');
    Route::get('create', [\App\Http\Controllers\App\CicloAvaliativo\CicloAvaliativoCreateController::class, 'create'])->name('ciclo-avaliativo.create');
    Route::post('store', [\App\Http\Controllers\App\CicloAvaliativo\CicloAvaliativoStoreController::class, 'store'])->name('ciclo-avaliativo.store');

    Route::prefix('{uuid}')->group(function() {
        Route::get('show', [\App\Http\Controllers\App\CicloAvaliativo\CicloAvaliativoShowController::class, 'show'])->name('ciclo-avaliativo.show');
        Route::get('incidencia/create', [IncidenciaCreateController::class, 'create'])->name('ciclo-avaliativo.incidencia.create');
        Route::post('incidencia/store',[IncidenciaStoreController::class, 'store'])->name('ciclo-avaliativo.incidencia.store');
        Route::get('modelo/create', [ModeloAvaliacaoCreateController::class, 'create'])->name('ciclo-avaliativo.modelo.create');
        Route::post('modelo/store', [ModeloAvaliacaoStoreController::class, 'store'])->name('ciclo-avaliativo.modelo.store');
        Route::get('calculo/create', [RegraPontuacaoCreateController::class, 'create'])->name('ciclo-avaliativo.calculo.create');
        Route::post('calculo/store', [RegraPontuacaoStoreController::class, 'store'])->name('ciclo-avaliativo.calculo.store');
    });
});
