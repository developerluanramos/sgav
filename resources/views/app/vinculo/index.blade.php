@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('vinculo') }}
@endsection

@section('title', 'Vinculos')

@section('content')

<x-layouts.headers.list-header :count="$vinculos->total()" :title="'Vinculos'" :route="'vinculo/create'"/>

@include('components.alerts.form-success')

@include('app.vinculo.partials.filters', [
    "vinculos" => $vinculos,
    "filters" => $filters
])

@include('app.vinculo.partials.list', [
    "vinculos" => $vinculos
])

@endsection
