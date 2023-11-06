@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('servidor.create') }}
@endsection

@section('title', 'Novo Servidor')

<x-layouts.headers.create-header :title="'Novo Servidor'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('servidor.store') }}" method="POST">
    @csrf
    @include('app.servidor.partials.form')
</form>
@endsection
