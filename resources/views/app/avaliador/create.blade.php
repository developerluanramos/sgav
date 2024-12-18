@extends('app.layouts.app')

{{-- @section('breadcrumb')
    {{ Breadcrumbs::render('avaliador.create') }}
@endsection --}}

@section('title', 'Novo Avaliador')

<x-layouts.headers.create-header :title="'Novo Avaliador'"/>

@section('content')

@include('components.alerts.form-errors')

{{-- <form action="{{ route('avaliador.store') }}" method="POST">
    @csrf
    @include('app.avaliador.partials.form')
</form> --}}

@endsection