@extends('app.layouts.app')

{{-- @section('breadcrumb')
    {{ Breadcrumbs::render('avaliador.create') }}
@endsection --}}

@section('title', 'Nova Avaliacao')

<x-layouts.headers.create-header :title="'Novo Avaliação'"/>

@section('content')

@include('components.alerts.form-errors')
<style>
    /* Main Table Styling */
.main-table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px 0;
    font-size: 14px;
    text-align: left;
    background-color: #fff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.main-table thead {
    background-color: #3293fa;
    color: #ffffff;
}

.main-table th, .main-table td {
    padding: 6px;
    border: 1px solid #e0e0e0;
}
</style>
<x-layouts.cards.content-card-icon
    :icon="''"
    :content-id="$formData['cicloAvaliativo']->uuid"
    :title="'Ciclo Avaliativo para fins de Estágio Probatório'"
    :route-action-text="'mais detalhes'"
    :route-action="''">
    @section($formData['cicloAvaliativo']->uuid)
        <p> 
            <b>{{$formData['cicloAvaliativo']->periodicidade->quantidade_ciclos}}</b> ciclos de 
            <b>{{$formData['cicloAvaliativo']->periodicidade->quantidade_unidade_ciclos}} </b>
            <b>{{$formData['cicloAvaliativo']->periodicidade->unidade_ciclos}}</b> | 
            <b>{{$formData['cicloAvaliativo']->periodicidade->quantidade_periodos}}</b> períodos de 
            <b>{{$formData['cicloAvaliativo']->periodicidade->quantidade_unidade_periodos}} </b>
            <b>{{$formData['cicloAvaliativo']->periodicidade->unidade_periodos}}</b>
        </p>
        <x-layouts.badges.step-ciclo-avaliativo :step="$formData['cicloAvaliativo']->step" />
        <x-layouts.badges.status-ciclo-avaliativo :status="$formData['cicloAvaliativo']->status"/>
        <div class="w-full mt-4 bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 73%">
                73%
            </div>
        </div>
    @endsection
</x-layouts.cards.content-card-icon>

<div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
        <x-layouts.cards.content-card-icon
            :icon="''"
            :content-id="'card-ciclos'.$formData['cicloAvaliativo']->uuid"
            :title="'Ciclos'"
            :route-action-text="'mais detalhes'"
            :route-action="''">
            @section('card-ciclos'.$formData['cicloAvaliativo']->uuid)
                <ul role="list" class="space-y-5 my-4 mt-8">
                    @for ($i = 1; $i <= $formData['cicloAvaliativo']->periodicidade->quantidade_ciclos; $i++)
                        <li class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>&nbsp
                            ciclo {{$i}} 
                            <br>
                        </li>
                        <ol role="list" class="space-y-5 my-4">
                            @for ($j = 1; $j <= $formData['cicloAvaliativo']->periodicidade->quantidade_periodos; $j++)
                                <li> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp periodo {{$j}}</li>
                            @endfor
                        </ol>
                    @endfor
                </ul>
            @endsection
        </x-layouts.cards.content-card-icon>
    </div>
    <div class="w-full md:w-10/12 px-3 mb-6 md:mb-0">
        {{-- @dd($formData['cicloAvaliativo']->modelos) --}}
        <x-layouts.cards.content-card-icon
            :icon="''"
            :content-id="'card-avaliacao'.$formData['cicloAvaliativo']->uuid"
            :title="'Avaliação'"
            :route-action-text="'mais detalhes'"
            :route-action="''">
            @section('card-avaliacao'.$formData['cicloAvaliativo']->uuid)
                @foreach ($formData['cicloAvaliativo']->modelos as $modelo)
                    <h5 class="mb-2 text-1xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$modelo->nome}}</h5>
                    @foreach ($modelo->fatoresAvaliacao as $fator)
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" style="width:100%">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-2 py-1">{{$fator->nome}}</th>
                                    <th scope="col" class="px-2 py-1">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fator->indicadoresDesempenho as $indicador)
                                    <tr>
                                        <td scope="col" class="px-2 py-1" style="width: 80%">{{$indicador->descricao}}</td>
                                        <td scope="col" class="px-2 py-1" style="width: 20%">
                                            <x-layouts.inputs.input-normal-select
                                                label=""
                                                name="equipe_uuid"
                                                origin="equipe_uuid"
                                                lenght="12/12"
                                                :data="$indicador->conceitoAvaliacao->itensConceitosAvaliacao"
                                                :value="$indicador->equipe_uuid ?? old('itensConceitosAvaliacao')"
                                            />
                                            {{-- {{$indicador->conceitoAvaliacao->itensConceitosAvaliacao}} --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                        </table>
                    @endforeach   
                @endforeach
            @endsection
        </x-layouts.cards.content-card-icon>
    </div>
</div>

@endsection