<?php

use App\Http\Controllers\App\CicloAvaliativoIncidencia\IncidenciaCreateController;
use App\Http\Controllers\App\CicloAvaliativoIncidencia\IncidenciaStoreController;
use App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoCreateController;
use App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreController;
use App\Http\Controllers\App\CicloAvaliativoPeriodicidade\PeriodicidadeCreateController;
use App\Http\Controllers\App\CicloAvaliativoPeriodicidade\PeriodicidadeStoreController;

Route::prefix('ciclo-avaliativo')->group(function () {
    Route::get('', [\App\Http\Controllers\App\CicloAvaliativo\CicloAvaliativoIndexController::class, 'index'])->name('ciclo-avaliativo.index');

    Route::get('periodicidade/create', [PeriodicidadeCreateController::class, 'create'])->name('ciclo-avaliativo.periodicidade.create');
    Route::post('periodicidade/store', [PeriodicidadeStoreController::class, 'store'])->name('ciclo-avaliativo.periodicidade.store');

    Route::get('incidencia/create', [IncidenciaCreateController::class, 'create'])->name('ciclo-avaliativo.incidencia.create');
    Route::post('incidencia/store',[IncidenciaStoreController::class, 'store'])->name('ciclo-avaliativo.incidencia.store');

    Route::get('template/create', [ModeloAvaliacaoCreateController::class, 'create'])->name('ciclo-avaliativo.template.create');
    Route::post('template/store', [ModeloAvaliacaoStoreController::class, 'store'])->name('ciclo-avaliativo.template.store');

    // Route::post('template/store', function() {
    //     return redirect()->route('ciclo-avaliativo.dependencia.create');
    // })->name('ciclo-avaliativo.template.store');

    Route::get('conclusao/create', function() {
        $repository = new \App\Repositories\CicloAvaliativo\CicloAvaliativoEloquentRepository(new \App\Models\CicloAvaliativo());
        $cicloAvaliativo = $repository->show('a6e07102-0bfd-4271-9b35-44fea9422111');
        return view('app.ciclo-avaliativo.dependencia.create', compact('cicloAvaliativo'));
    })->name('ciclo-avaliativo.conclusao.create');

    Route::post('dependencia/store', function() {
        return redirect()->route('ciclo-avaliativo.index');
    })->name('ciclo-avaliativo.dependencia.store');
});
