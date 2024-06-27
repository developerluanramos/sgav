@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('vinculo.create') }}
@endsection

@section('title', 'Novo Vinculo')

<x-layouts.headers.create-header :title="'Novo Vinculo'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('vinculo.store') }}" method="POST">
    @csrf
    @include('app.vinculo.partials.form')
</form>

@endsection
