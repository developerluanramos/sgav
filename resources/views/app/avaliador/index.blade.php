@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('avaliador') }}
@endsection

@section('title', 'Avaliadores')

@section('content')

<x-layouts.headers.list-header :count="$avaliadores->total()" :title="'Avaliadores'" :route="'avaliador/create'"/>

@include('components.alerts.form-success')

@include('app.avaliador.partials.filters', [
    "avaliadores" => $avaliadores,
    "filters" => $filters
])

@include('app.avaliador.partials.list', [
    "avaliadores" => $avaliadores,
    "filters" => $filters
])

@endsection
