@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('integracao') }}
@endsection

@section('title', 'Integrações MAP/SIAP')

@section('content')

<x-layouts.headers.list-header :count="count($integracoes)" :title="'Integrações'" :route="''"/>

@include('components.alerts.form-success')


{{-- 
@include('app.cargo.partials.filters', [
    "cargos" => $cargos,
    "filters" => $filters
])
--}}

@include('app.integracao.partials.list', [
    "integracoes" => $integracoes,
    "filters" => []
])

@endsection
