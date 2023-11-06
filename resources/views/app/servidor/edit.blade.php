@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('servidor.edit', $servidor) }}
@endsection

@section('title', 'Edição Servidor')

<x-layouts.headers.edit-header :title="$servidor->uuid.' - '.$servidor->nome"/>

@section('content')

@include('components.alerts.form-errors')


<form action="{{ route('servidor.update', $servidor->uuid) }}" method="POST">
    @csrf
    @method('PUT')
    @include('app.servidor.partials.form')
</form>


@endsection
