<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('usuario', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Usuarios', route('usuario.index'));
});

Breadcrumbs::for('integracao', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Integração', route('integracao.index'));
});

Breadcrumbs::for('usuario.create', function ($trail) {
    $trail->parent('usuario');
    $trail->push('Novo Usuario', route('usuario.create'));
});

Breadcrumbs::for('usuario.edit', function ($trail, $user) {
    $trail->parent('usuario');
    $trail->push('Edição de Usuario', route('usuario.edit', $user));
});


Breadcrumbs::for('servidor', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Servidores', route('servidor.index'));
});

Breadcrumbs::for('servidor.create', function ($trail) {
    $trail->parent('servidor');
    $trail->push('Novo Servidor', route('servidor.create'));
});

Breadcrumbs::for('servidor.edit', function ($trail, $servidor) {
    $trail->parent('servidor');
    $trail->push('Edição de Servidor', route('servidor.edit', $servidor));
});

Breadcrumbs::for('Dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::for('fornecedor', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Fornecedores', route('fornecedor.index'));
});
Breadcrumbs::for('fornecedor.create', function (BreadcrumbTrail $trail) {
    $trail->parent('fornecedor');
    $trail->push('Novo Fornecedor', route('fornecedor.create'));
});
Breadcrumbs::for('fornecedor.edit', function (BreadcrumbTrail $trail, $fornecedor) {
    $trail->parent('fornecedor');
    $trail->push('Edição de Fornecedor', route('fornecedor.edit', $fornecedor));
});
Breadcrumbs::for('fornecedor.show', function (BreadcrumbTrail $trail) {
    $trail->parent('fornecedor');
    $trail->push('Fornecedor', route('fornecedor.show'));
});

Breadcrumbs::for('cargo', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Cargos', route('cargo.index'));
});
Breadcrumbs::for('cargo.create', function (BreadcrumbTrail $trail) {
    $trail->parent('cargo');
    $trail->push('Novo Cargo', route('cargo.create'));
});
Breadcrumbs::for('cargo.edit', function (BreadcrumbTrail $trail, $cargo) {
    $trail->parent('cargo');
    $trail->push('Edição de Cargo', route('cargo.edit', $cargo));
});
Breadcrumbs::for('cargo.show', function (BreadcrumbTrail $trail) {
    $trail->parent('cargo');
    $trail->push('Cargo', route('cargo.show'));
});

Breadcrumbs::for('equipe', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Equipes', route('equipe.index'));
});

Breadcrumbs::for('equipe.create', function ($trail) {
    $trail->parent('equipe');
    $trail->push('Nova Equipe', route('equipe.create'));
});

Breadcrumbs::for('equipe.edit', function ($trail, $equipe) {
    $trail->parent('equipe');
    $trail->push('Edição de Equipe', route('equipe.edit', $equipe));
});

Breadcrumbs::for('modelo-avaliacao', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Modelos de Avaliação', route('modelo-avaliacao.index'));
});
Breadcrumbs::for('modelo-avaliacao.create', function (BreadcrumbTrail $trail) {
    $trail->parent('modelo-avaliacao');
    $trail->push('Novo Modelo Avaliação', route('modelo-avaliacao.create'));
});
Breadcrumbs::for('modelo-avaliacao.edit', function (BreadcrumbTrail $trail, $modeloAvaliacao) {
    $trail->parent('modelo-avaliacao');
    $trail->push('Edição de Modelo Avaliação', route('modelo-avaliacao.edit', $modeloAvaliacao));
});
Breadcrumbs::for('modelo-avaliacao.show', function (BreadcrumbTrail $trail) {
    $trail->parent('modelo-avaliacao');
    $trail->push('Modelo Avaliação', route('modelo-avaliacao.show'));
});

Breadcrumbs::for('conceito-avaliacao', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Conceito de Avaliação', route('conceito-avaliacao.index'));
});
Breadcrumbs::for('conceito-avaliacao.create', function (BreadcrumbTrail $trail) {
    $trail->parent('conceito-avaliacao');
    $trail->push('Novo Conceito Avaliação', route('conceito-avaliacao.create'));
});
Breadcrumbs::for('conceito-avaliacao.edit', function (BreadcrumbTrail $trail, $conceitoAvaliacao) {
    $trail->parent('conceito-avaliacao');
    $trail->push('Edição Conceito Avaliação', route('conceito-avaliacao.edit', $conceitoAvaliacao));
});

Breadcrumbs::for('setor', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Setores', route('setor.index'));
});
Breadcrumbs::for('setor.create', function (BreadcrumbTrail $trail) {
    $trail->parent('setor');
    $trail->push('Novo Setor', route('setor.create'));
});

Breadcrumbs::for('setor.edit', function (BreadcrumbTrail $trail, $setor) {
    $trail->parent('setor');
    $trail->push('Edição de Setor', route('setor.edit', $setor));
});

Breadcrumbs::for('posto-trabalho', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Postos Trabalho', route('posto-trabalho.index'));
});
Breadcrumbs::for('posto-trabalho.create', function (BreadcrumbTrail $trail) {
    $trail->parent('posto-trabalho');
    $trail->push('Novo Posto Trabalho', route('posto-trabalho.create'));
});
Breadcrumbs::for('posto-trabalho.edit', function (BreadcrumbTrail $trail, $cargo) {
    $trail->parent('posto-trabalho');
    $trail->push('Edição de Posto Trabalho', route('posto-trabalho.edit', $cargo));
});

Breadcrumbs::for('departamento', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard', route('dashboard.index'));
    $trail->push('Departamentos', route('departamento.index'));
});
Breadcrumbs::for('departamento.edit', function (BreadcrumbTrail $trail, $departamento) {
    $trail->parent('departamento');
    $trail->push('Edição de Departamento', route('departamento.edit', $departamento));
});

Breadcrumbs::for('ciclos-avaliativos', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Ciclos Avaliativos', route('ciclo-avaliativo.index'));
});

Breadcrumbs::for('vinculo', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Vinculos', route('vinculo.index'));
});

Breadcrumbs::for('vinculo.create', function ($trail) {
    $trail->parent('vinculo');
    $trail->push('Nova Vinculo', route('vinculo.create'));
});

Breadcrumbs::for('vinculo.edit', function ($trail, $vinculo) {
    $trail->parent('vinculo');
    $trail->push('Edição de Vinculo', route('vinculo.edit', $vinculo));
});

Breadcrumbs::for('avaliador', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Avaliador', route('avaliador.index'));
});


