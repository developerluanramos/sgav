@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('servidor') }}
@endsection

@section('title', 'Servidores')

@section('content')

<x-layouts.headers.list-header :count="$servidores->total()" :title="'Servidores'" :route="'servidor/create'"/>

@include('app.servidor.partials.filters', [
    "servidores" => $servidores,
    "filters" => $filters
])


@include('app.servidor.partials.list', [
    "servidores" => $servidores
])

@endsection
