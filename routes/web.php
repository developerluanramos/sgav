<?php

use App\Http\Controllers\App\Dashboard\DashboardIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/equipe/show/{uuid}', [\App\Http\Controllers\App\Equipe\EquipeShowController::class, 'show'])->name('equipe.show');
Route::get('/equipe/create', [\App\Http\Controllers\App\Equipe\EquipeCreateController::class, 'create'])->name('equipe.create');
Route::put('/equipe/{equipe}', [\App\Http\Controllers\App\Equipe\EquipeUpdateController::class, 'update'])->name('equipe.update');
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

Route::get('/', [DashboardIndexController::class, 'index'])->name('dashboard.index');

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
