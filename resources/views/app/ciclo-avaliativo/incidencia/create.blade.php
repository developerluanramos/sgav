@extends('app.layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('ciclo-avaliativo.incidencia.create') }}
@endsection

@section('title', 'Novo Ciclo Avaliativo')

@section('content')
@include('app.ciclo-avaliativo.partials.small-view', ['cicloAvaliativo' => $formData['cicloAvaliativo']])

    <div class="mt-6">
        @include('components.alerts.form-errors')
    </div>
    <form method="POST" action="{{route('ciclo-avaliativo.incidencia.store', ['uuid' => $formData['ciclosAvaliativosUuid']])}}">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-2 p-3">
            <div class="md:w-4/12 p-2">
                @livewire('components.select-boxes.orgao')
            </div>

            <div class="md:w-4/12 p-2">
                @livewire('components.select-boxes.local-trabalho')
            </div>
           
            <div class="md:w-4/12 p-2">
                @livewire('components.select-boxes.funcao')
            </div>
            {{-- <x-layouts.inputs.input-normal-select
                label="Equipe"
                name="equipe_uuid"
                origin="equipe_uuid"
                lenght="4/12"
                :data="$formData['equipes']"
                :value="$vinculo->equipe_uuid ?? old('equipe_uuid')"
            />

            <x-layouts.inputs.input-normal-select
                label="Cargo"
                name="cargo_uuid"
                origin="cargo_uuid"
                lenght="4/12"
                :data="$formData['cargos']"
                :value="$vinculo->cargo_uuid ?? old('equipe_uuid')"
            /> --}}
        </div>
        <x-layouts.buttons.submit-button text="Salvar"/>
    </form>
@endsection

