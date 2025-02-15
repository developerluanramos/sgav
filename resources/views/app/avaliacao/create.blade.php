@extends('app.layouts.app')

{{-- @section('breadcrumb')
    {{ Breadcrumbs::render('avaliador.create') }}
@endsection --}}

@section('title', 'Nova Avaliacao')

{{-- <x-layouts.headers.create-header :title="'Novo Avaliação'"/> --}}

@section('content')

@include('components.alerts.form-errors')

<div class="grid grid-cols-1 gap-4">
    
    {{-- <div>
        @include('app.vinculo.partials.small-view', [
            'vinculo' => $formData['vinculo']
        ])
    </div> --}}
</div>

<div class="grid grid-cols-12 gap-4 mt-2">
    <div class="col-span-3">
        @include('app.avaliacao.partials.small-view', [
            'cicloAvaliativo' => $formData['cicloAvaliativo']
        ])
    </div>
    <div class="col-span-9">
        @include('app.ciclo-avaliativo.partials.small-view', [
            'cicloAvaliativo' => $formData['cicloAvaliativo']
        ])
        <div class="mt-2">
            @include('app.vinculo.partials.small-view', [
                'vinculo' => $formData['vinculo']
            ])
        </div>
    </div>
</div>

@endsection