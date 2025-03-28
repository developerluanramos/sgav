<?php

Route::get('/integracao', [\App\Http\Controllers\App\Integracao\IntegracaoIndexController::class, 'index'])->name('integracao.index');
Route::post('/integracao/{uuid}/sincronizar', [\App\Http\Controllers\App\Integracao\IntegracaoSincController::class, 'sinc'])->name('integracao.sinc');
