@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('vinculo.edit', $vinculo) }}
@endsection

@section('title', 'Edição Vinculo')

<x-layouts.headers.edit-header :title="$vinculo->uuid.' - '.$vinculo->servidor['nome']"/>

@section('content')


@include('components.alerts.form-errors')


<form action="{{ route('vinculo.update', $vinculo->uuid) }}" method="POST">
    @csrf
    @method('PUT')
    @include('app.vinculo.partials.form')
</form>


@endsection
