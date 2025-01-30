<?php

Route::get('/integracao', [\App\Http\Controllers\App\Integracao\IntegracaoIndexController::class, 'index'])->name('integracao.index');
