@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('modelo-avaliacao') }}
@endsection

@section('title', 'Modelos de Avaliação')

@section('content')

<x-layouts.headers.list-header :count="$modeloAvaliacao->total()" :title="'Modelos de Avaliação'" :route="'modelo-avaliacao/create'"/>

@include('components.alerts.form-success')

@include('app.modelo-avaliacao.partials.filters', [
    "modeloAvalicao" => $modeloAvaliacao,
    "filters" => $filters
])


@include('app.modelo-avaliacao.partials.list', [
    "modeloAvalicao" => $modeloAvaliacao,
    "filters" => $filters
])

@endsection
