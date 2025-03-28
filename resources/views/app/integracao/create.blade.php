@extends('app.layouts.app')

{{-- @section('breadcrumb')
    {{ Breadcrumbs::render('integracao.create') }}
@endsection --}}

@section('title', 'Nova Integração')

<x-layouts.headers.create-header :title="'Nova Integração'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('integracao.store') }}" method="POST">
    @csrf
    @include('app.cargo.partials.form')
</form>

@endsection