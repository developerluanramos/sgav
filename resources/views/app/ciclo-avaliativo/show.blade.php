@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('ciclos-avaliativos') }}
@endsection

@section('title', 'Ciclo Avaliativo')

@section('content')

<x-layouts.cards.content-card-icon
    :icon="''"
    :content-id="$cicloAvaliativo->uuid"
    :title="'Ciclo Avaliativo para fins de Estágio Probatório'"
    :route-action-text="'mais detalhes'"
    :route-action="''">
    @section($cicloAvaliativo->uuid)
        <p> 
            <b>{{$cicloAvaliativo->periodicidade->quantidade_ciclos}}</b> ciclos de 
            <b>{{$cicloAvaliativo->periodicidade->quantidade_unidade_ciclos}} </b>
            <b>{{$cicloAvaliativo->periodicidade->unidade_ciclos}}</b> | 
            <b>{{$cicloAvaliativo->periodicidade->quantidade_periodos}}</b> períodos de 
            <b>{{$cicloAvaliativo->periodicidade->quantidade_unidade_periodos}} </b>
            <b>{{$cicloAvaliativo->periodicidade->unidade_periodos}}</b>
        </p>
        <x-layouts.badges.step-ciclo-avaliativo :step="$cicloAvaliativo->step" />
        <x-layouts.badges.status-ciclo-avaliativo :status="$cicloAvaliativo->status"/>
        <div class="w-full mt-4 bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 73%">
                73%
            </div>
        </div>
    @endsection
</x-layouts.cards.content-card-icon>


<h6 class="mb-2 mt-4 text-2 font-semibold tracking-tight text-gray-900 dark:text-white">
    Vinculos aptos
</h6>

<x-layouts.tables.simple-table
    :headers="[
        'Código Controle',
        'Nome',
        'Status',
        'Progresso',
        // 'Fase',
        // 'Status',
        'Ações'
    ]"
    :appends="[]"
>
    @section('table-content')
        @foreach($avaliados as $index => $avaliado)
            <tr>
                <td>{{$avaliado->uuid}}</td>
                <td>{{$avaliado->servidor->nome}}</td>
                <td>
                    <x-layouts.badges.situacao-vinculo-avaliacao :situacao="random_int(0, 1)" />
                </td>
                <td>
                    <div class="w-full mt-4 bg-gray-200 rounded-full dark:bg-gray-700">
                        <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{ random_int(1, 99) }}%">
                            
                        </div>
                    </div>
                </td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                        text="Ver"
                        action="ver"
                        color="secondary"
                        :route="route('ciclo-avaliativo.show', ['uuid' => $avaliado->uuid])"
                    />
                    <x-layouts.buttons.action-button
                        text="Editar"
                        action="editar"
                        color="primary"
                        :route="route('avaliacao.create', [
                            'cicloAvaliativoUuid' => $cicloAvaliativo->uuid,
                            'vinculoUuid' => $avaliado->uuid
                        ])"
                    />
                    {{-- @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.periodicidade.create')"
                        />
                    @endif
                    @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.incidencia.create', ['ciclosAvaliativosUuid' => $ciclo->uuid])"
                        />
                    @endif
                    @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::TEMPLATE)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.template.create', ['ciclosAvaliativosUuid' => $ciclo->uuid])"
                        />
                    @endif
                    @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::CONCLUSAO)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.conclusao.create', ['ciclosAvaliativosUuid' => $ciclo->uuid])"
                        />
                    @endif --}}
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>

@endsection