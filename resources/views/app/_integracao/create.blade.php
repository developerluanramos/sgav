@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('integracao') }}
@endsection

@section('title', 'Integrações MAP/SIAP')

@section('content')

<x-layouts.headers.list-header :count="$cargos->total()" :title="'Integrações'" :route="'cargo/create'"/>

@include('components.alerts.form-success')

@endsection