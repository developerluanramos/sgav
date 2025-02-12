@extends('app.layouts.app')

{{-- @section('breadcrumb')
    {{ Breadcrumbs::render('cargo.create') }}
@endsection --}}

@section('title', 'Ciclo Avaliativo')

<x-layouts.headers.create-header :title="'Novo Ciclo'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('ciclo-avaliativo.store') }}" method="POST">
    @csrf
    @include('app.ciclo-avaliativo.partials.form', ['formData' => $formData])
</form>

@endsection
