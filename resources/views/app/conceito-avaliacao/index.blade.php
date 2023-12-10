@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('conceito-avaliacao') }}
@endsection

@section('title', 'Conceitos de Avaliação')

@section('content')

<x-layouts.headers.list-header :count="$conceitoAvaliacao->total()" :title="'Conceitos de Avaliação'" :route="'conceito-avaliacao/create'"/>

@include('components.alerts.form-success')

@include('app.conceito-avaliacao.partials.filters', [
    "conceitoAvaliacao" => $conceitoAvaliacao,
    "filters" => $filters
])


@include('app.conceito-avaliacao.partials.list', [
    "conceitoAvaliacao" => $conceitoAvaliacao,
    "filters" => $filters
])

@endsection
