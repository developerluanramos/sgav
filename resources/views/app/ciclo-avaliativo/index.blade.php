@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('ciclos-avaliativos') }}
@endsection

@section('title', 'Ciclos Avaliativos')

@section('content')

    <x-layouts.headers.list-header :count="count($ciclosAvaliativos->items())" :title="'Ciclos Avaliativos'" :route="route('ciclo-avaliativo.periodicidade.create')"/>

    @include('components.alerts.form-success')

{{--    @include('app.conceito-avaliacao.partials.filters', [--}}
{{--        "conceitoAvaliacao" => $conceitoAvaliacao,--}}
{{--        "filters" => $filters--}}
{{--    ])--}}


    @include('app.ciclo-avaliativo.partials.list', [
        "ciclosAvaliativos" => $ciclosAvaliativos,
        "filters" => []
    ])

@endsection
