<?php

use App\Http\Controllers\App\Dashboard\DashboardIndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [\App\Http\Controllers\Auth\AuthLoginController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [\App\Http\Controllers\Auth\AuthLoginController::class, 'login'])->name('auth.login');
Route::get('/auth/open-request-password-change', [\App\Http\Controllers\Auth\AuthLoginController::class, 'index'])->name('auth.open-request-password-change');
Route::post('/auth/send-request-password-change', [\App\Http\Controllers\Auth\AuthLoginController::class, 'index'])->name('auth.send-request-password-change');
Route::get('/auth/open-password-change', [\App\Http\Controllers\Auth\AuthLoginController::class, 'index'])->name('auth.open-password-change');
Route::post('/auth/send-password-change', [\App\Http\Controllers\Auth\AuthLoginController::class, 'index'])->name('auth.send-password-change');

Route::middleware(['auth.basic'])->group(function() {
    Route::get('/auth/logout', function() {  Auth::logout(); return redirect()->route('auth.index'); })->name('auth.logout');

    Route::get('/equipe/show/{uuid}', [\App\Http\Controllers\App\Equipe\EquipeShowController::class, 'show'])->name('equipe.show');
    Route::get('/equipe/create', [\App\Http\Controllers\App\Equipe\EquipeCreateController::class, 'create'])->name('equipe.create');
    Route::put('/equipe/{uuid}', [\App\Http\Controllers\App\Equipe\EquipeUpdateController::class, 'update'])->name('equipe.update');
    Route::get('/equipe', [\App\Http\Controllers\App\Equipe\EquipeIndexController::class, 'index'])->name('equipe.index');
    Route::get('/equipe/edit/{equipe}', [\App\Http\Controllers\App\Equipe\EquipeEditController::class, 'edit'])->name('equipe.edit');
    Route::post('/equipe', [\App\Http\Controllers\App\Equipe\EquipeStoreController::class, 'store'])->name('equipe.store');

    Route::get('/usuario/show/{uuid}', [\App\Http\Controllers\App\Usuario\UsuarioShowController::class, 'show'])->name('usuario.show');
    Route::get('/usuario/create', [\App\Http\Controllers\App\Usuario\UsuarioCreateController::class, 'create'])->name('usuario.create');
    Route::put('/usuario/{user}', [\App\Http\Controllers\App\Usuario\UsuarioUpdateController::class, 'update'])->name('usuario.update');
    Route::get('/usuario', [\App\Http\Controllers\App\Usuario\UsuarioIndexController::class, 'index'])->name('usuario.index');
    Route::get('/usuario/edit/{user}', [\App\Http\Controllers\App\Usuario\UsuarioEditController::class, 'edit'])->name('usuario.edit');
    Route::post('/usuario', [\App\Http\Controllers\App\Usuario\UsuarioStoreController::class, 'store'])->name('usuario.store');

    Route::get('servidor/show/{uuid}', [\App\Http\Controllers\App\Servidor\ServidorShowController::class, 'show'])->name('servidor.show');
    Route::get('/servidor/create', [\App\Http\Controllers\App\Servidor\ServidorCreateController::class, 'create'])->name('servidor.create');
    Route::put('/servidor/{servidor}', [\App\Http\Controllers\App\Servidor\ServidorUpdateController::class, 'update'])->name('servidor.update');
    Route::get('/servidor', [\App\Http\Controllers\App\Servidor\ServidorIndexController::class, 'index'])->name('servidor.index');
    Route::get('/servidor/edit/{servidor}', [\App\Http\Controllers\App\Servidor\ServidorEditController::class, 'edit'])->name('servidor.edit');
    Route::post('/servidor', [\App\Http\Controllers\App\Servidor\ServidorStoreController::class, 'store'])->name('servidor.store');

    Route::get('/dashboard', [DashboardIndexController::class, 'index'])->name('dashboard.index');

    Route::get('fornecedor', [\App\Http\Controllers\App\Fornecedor\FornecedorIndexController::class, 'index'])->name('fornecedor.index');
    Route::get('fornecedor/create', [\App\Http\Controllers\App\Fornecedor\FornecedorCreateController::class, 'create'])->name('fornecedor.create');
    Route::post('fornecedor', [\App\Http\Controllers\App\Fornecedor\FornecedorStoreController::class, 'store'])->name('fornecedor.store');
    Route::get('fornecedor/{uuid}/show', [\App\Http\Controllers\App\Fornecedor\FornecedorShowController::class, 'show'])->name('fornecedor.show');
    Route::get('fornecedor/{uuid}/edit', [\App\Http\Controllers\App\Fornecedor\FornecedorEditController::class, 'edit'])->name('fornecedor.edit');
    Route::put('fornecedor/{uuid}/update', [\App\Http\Controllers\App\Fornecedor\FornecedorUpdateController::class, 'update'])->name('fornecedor.update');

    Route::get('cargo/create', [\App\Http\Controllers\App\Cargo\CargoCreateController::class, 'create'])->name('cargo.create');
    Route::post('cargo', [\App\Http\Controllers\App\Cargo\CargoStoreController::class, 'store'])->name('cargo.store');
    Route::get('cargo', [\App\Http\Controllers\App\Cargo\CargoIndexController::class, 'index'])->name('cargo.index');
    Route::get('cargo/{uuid}/show', [\App\Http\Controllers\App\Cargo\CargoShowController::class, 'show'])->name('cargo.show');
    Route::get('cargo/{uuid}/edit', [\App\Http\Controllers\App\Cargo\CargoEditController::class, 'edit'])->name('cargo.edit');
    Route::put('cargo/{uuid}/update', [\App\Http\Controllers\App\Cargo\CargoUpdateController::class, 'update'])->name('cargo.update');

    Route::get('modelo-avaliacao/create', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoCreateController::class, 'create'])->name('modelo-avaliacao.create');
    Route::post('modelo-avaliacao', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoStoreController::class, 'store'])->name('modelo-avaliacao.store');
    Route::get('modelo-avaliacao', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoIndexController::class, 'index'])->name('modelo-avaliacao.index');
    Route::get('modelo-avaliacao/{uuid}/show', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoShowController::class, 'show'])->name('modelo-avaliacao.show');
    Route::get('modelo-avaliacao/{uuid}/edit', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoEditController::class, 'edit'])->name('modelo-avaliacao.edit');
    Route::put('modelo-avaliacao/{uuid}/update', [\App\Http\Controllers\App\ModeloAvaliacao\ModeloAvaliacaoUpdateController::class, 'update'])->name('modelo-avaliacao.update');

    Route::get('conceito-avaliacao/create', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoCreateController::class, 'create'])->name('conceito-avaliacao.create');
    Route::post('conceito-avaliacao', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoStoreController::class, 'store'])->name('conceito-avaliacao.store');
    Route::get('conceito-avaliacao', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoIndexController::class, 'index'])->name('conceito-avaliacao.index');
    Route::get('conceito-avaliacao/{uuid}/show', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoShowController::class, 'show'])->name('conceito-avaliacao.show');
    Route::get('conceito-avaliacao/{uuid}/edit', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoEditController::class, 'edit'])->name('conceito-avaliacao.edit');
    Route::put('conceito-avaliacao/{uuid}/update', [\App\Http\Controllers\App\ConceitoAvaliacao\ConceitoAvaliacaoUpdateController::class, 'update'])->name('conceito-avaliacao.update');

    Route::delete('item-conceito-avaliacao/{uuid}', [\App\Http\Controllers\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoDeleteController::class, 'delete'])->name('item-conceito-avaliacao.delete');
    Route::put('item-conceito-avaliacao/{uuid}/update', [\App\Http\Controllers\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateController::class, 'update'])->name('item-conceito-avaliacao.update');

    Route::post('fator-avaliacao/{modeloAvaliacaoUuid}', [\App\Http\Controllers\App\FatorAvaliacao\FatorAvaliacaoStoreController::class, 'store'])->name('fator-avaliacao.store');
    Route::put('fator-avaliacao/{uuid}/update', [\App\Http\Controllers\App\FatorAvaliacao\FatorAvaliacaoUpdateController::class, 'update'])->name('fator-avaliacao.update');
    Route::delete('fator-avaliacao/{uuid}', [\App\Http\Controllers\App\FatorAvaliacao\FatorAvaliacaoStoreController::class, 'destroy'])->name('fator-avaliacao.destroy');

    Route::post('indicador-desempenho/', [\App\Http\Controllers\App\IndicadorDesempenho\IndicadorDesempenhoStoreController::class, 'store'])->name('indicador-desempenho.store');

    Route::get('setor/create', [\App\Http\Controllers\App\Setor\SetorCreateController::class, 'create'])->name('setor.create');
    Route::post('setor', [\App\Http\Controllers\App\Setor\SetorStoreController::class, 'store'])->name('setor.store');
    Route::get('setor', [\App\Http\Controllers\App\Setor\SetorIndexController::class, 'index'])->name('setor.index');
    Route::delete('setor/{uuid}', [\App\Http\Controllers\App\Setor\SetorDeleteController::class, 'delete'])->name('setor.delete');
    Route::get('setor/{uuid}/edit', [\App\Http\Controllers\App\Setor\SetorEditController::class, 'edit'])->name('setor.edit');
    Route::put('setor/{uuid}/update', [\App\Http\Controllers\App\Setor\SetorUpdateController::class, 'update'])->name('setor.update');

    Route::get('posto-trabalho/create', [\App\Http\Controllers\App\PostoTrabalho\PostoTrabalhoCreateController::class, 'create'])->name('posto-trabalho.create');
    Route::post('posto-trabalho/', [\App\Http\Controllers\App\PostoTrabalho\PostoTrabalhoStoreController::class, 'store'])->name('posto-trabalho.store');
    Route::get('posto-trabalho/', [\App\Http\Controllers\App\PostoTrabalho\PostoTrabalhoIndexController::class, 'index'])->name('posto-trabalho.index');
    Route::delete('posto-trabalho/{uuid}', [\App\Http\Controllers\App\PostoTrabalho\PostoTrabalhoDeleteController::class, 'delete'])->name('posto-trabalho.delete');
    Route::get('posto-trabalho/{uuid}/edit', [\App\Http\Controllers\App\PostoTrabalho\PostoTrabalhoEditController::class, 'edit'])->name('posto-trabalho.edit');
    Route::put('posto-trabalho/{uuid}/update', [\App\Http\Controllers\App\PostoTrabalho\PostoTrabalhoUpdateController::class, 'update'])->name('posto-trabalho.update');

    Route::get('departamento/create', [\App\Http\Controllers\App\Departamento\DepartamentoCreateController::class, 'create'])->name('departamento.create');
    Route::post('departamento/', [\App\Http\Controllers\App\Departamento\DepartamentoStoreController::class, 'store'])->name('departamento.store');
    Route::get('departamento/', [\App\Http\Controllers\App\Departamento\DepartamentoIndexController::class, 'index'])->name('departamento.index');
});
