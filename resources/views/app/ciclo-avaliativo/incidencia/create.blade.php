@extends('app.layouts.app')

{{--@section('breadcrumb')--}}
{{--    {{ Breadcrumbs::render('conceito-avaliacao.create') }}--}}
{{--@endsection--}}

@section('title', 'Novo Ciclo Avaliativo')

<x-layouts.headers.create-header :title="'Novo Ciclo Avaliativo'"/>

@section('content')
    @include('app.ciclo-avaliativo.partials.stepper', ['step' => \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA])

    <div class="mt-6">
        @include('components.alerts.form-errors')
    </div>
    <form method="POST" action="{{route('ciclo-avaliativo.incidencia.store', ['ciclosAvaliativosUuid' => $formData['ciclosAvaliativosUuid']])}}">
        @csrf
        <div>
            @livewire('components.select-boxes.estrutura-organizacional', [
                'components' => ['departamentos', 'setores', 'postos_trabalho'],
                    'departamentoUuid' => $vinculo->departamentos_uuid ?? old('departamentoUuid'),
                    'setorUuid' => $vinculo->setores_uuid ?? old('setorUuid'),
                    'postoTrabalhoUuid' => $vinculo->postos_trabalho_uuid ?? old('postoTrabalhoUuid'),
            ])
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <x-layouts.inputs.input-normal-select
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
            />
        </div>
        <x-layouts.buttons.submit-button text="Salvar"/>
    </form>
@endsection

