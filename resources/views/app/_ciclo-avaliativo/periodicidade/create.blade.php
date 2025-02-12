@extends('app.layouts.app')

@section('title', 'Novo Ciclo Avaliativo')

<x-layouts.headers.create-header :title="'Novo Ciclo Avaliativo'"/>

@section('content')
    @include('app.ciclo-avaliativo.partials.stepper', ['step' => \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE])

    <div class="mt-6">
        @include('components.alerts.form-errors')
    </div>
    <form class="mt-6" method="POST" action="{{route('ciclo-avaliativo.periodicidade.store')}}">
        @csrf

        @livewire('app.ciclo-avaliativo.create', ["formData" => $formData])
        
        {{-- <div class="flex items-end align-content-end align-items-end">
            <x-layouts.buttons.submit-button text="Prosseguir"/>
        </div> --}}
    </form>
@endsection



