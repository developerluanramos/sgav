@extends('app.layouts.app')

{{-- @section('breadcrumb')
    {{ Breadcrumbs::render('avaliador.create') }}
@endsection --}}

@section('title', 'Nova Avaliacao')

{{-- <x-layouts.headers.create-header :title="'Novo Avaliação'"/> --}}

@section('content')

@include('components.alerts.form-errors')

<div class="grid grid-cols-2 gap-4">
    <div>
        @include('app.ciclo-avaliativo.partials.small-view', [
            'cicloAvaliativo' => $formData['cicloAvaliativo']
        ])
    </div>
    <div>
        @include('app.vinculo.partials.small-view', [
            'vinculo' => $formData['vinculo']
        ])
    </div>
</div>

@endsection