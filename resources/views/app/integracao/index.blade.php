@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('integracao') }}
@endsection

@section('title', 'Integrações MAP/SIAP')

@section('content')

{{-- <x-layouts.headers.list-header :count="$cargos->total()" :title="'Cargos'" :route="'cargo/create'"/> --}}

@include('components.alerts.form-success')


<div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
        @livewire('integracao.map.vinculo')
    </div>
    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
        @livewire('integracao.map.avaliador')
    </div>
    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
        @livewire('integracao.map.tipo-ocorrencia')
    </div>
    <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
        @livewire('integracao.map.ocorrencia')
    </div>
</div>

{{-- @include('app.cargo.partials.filters', [
    "cargos" => $cargos,
    "filters" => $filters
])

@include('app.cargo.partials.list', [
    "cargos" => $cargos,
    "filters" => $filters
]) --}}

@endsection
