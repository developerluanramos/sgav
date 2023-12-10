@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('conceito-avaliacao.create') }}
@endsection

@section('title', 'Novo Conceito')

<x-layouts.headers.create-header :title="'Novo Conceito'"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{ route('conceito-avaliacao.store') }}" method="POST" class="mt-4">
    @csrf
    @include('app.conceito-avaliacao.partials.form')
</form>

@endsection


