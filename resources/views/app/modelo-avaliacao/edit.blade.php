@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('modelo-avaliacao.edit', $modeloAvaliacao) }}
@endsection

@section('title', 'Edição Modelo de Avaliação')

<x-layouts.headers.edit-header :title="$modeloAvaliacao->uuid.' - '.$modeloAvaliacao->nome"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('modelo-avaliacao.update', $modeloAvaliacao->uuid)}}" method="POST">
    @method('PUT')
    @include('app.modelo-avaliacao.partials.form', ["modeloAvaliacao" => $modeloAvaliacao])
</form>

@endsection
