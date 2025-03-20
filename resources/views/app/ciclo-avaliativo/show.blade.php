@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('ciclos-avaliativos') }}
@endsection

@section('title', 'Ciclo Avaliativo')

@section('content')

@include('app.ciclo-avaliativo.partials.small-view', ['cicloAvaliativo' => $cicloAvaliativo])

<div class="mt-2 mb-2">
    <button 
        data-modal-target="modal-incidencia" 
        data-modal-toggle="modal-incidencia"
        type="button" 
        class="inline-flex mr-2 items-center 
        px-5 py-2.5 text-sm font-medium 
        text-center text-white bg-blue-700 
        rounded-lg hover:bg-blue-800 
        focus:ring-4 focus:outline-none 
        focus:ring-blue-300 dark:bg-blue-600 
        dark:hover:bg-blue-700 
        dark:focus:ring-blue-800">
        <svg class="w-5 h-5 text-gray-800 dark:text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
        </svg>
        Incidências
        <span class="inline-flex ms-6 items-center justify-center w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
            {{ count($cicloAvaliativo['incidencias']) }}
        </span>
    </button>
    <button
        data-modal-target="modal-modelo" 
        data-modal-toggle="modal-modelo"
        type="button" 
        class="inline-flex mr-2 items-center 
        px-5 py-2.5 text-sm font-medium 
        text-center text-white bg-blue-700 
        rounded-lg hover:bg-blue-800 
        focus:ring-4 focus:outline-none 
        focus:ring-blue-300 dark:bg-blue-600 
        dark:hover:bg-blue-700 
        dark:focus:ring-blue-800">
        <svg class="w-5 h-5 text-gray-800 dark:text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
        </svg>  
        Modelos
        <span class="inline-flex ms-6 items-center justify-center w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
            {{ count($cicloAvaliativo['modelos']) }}
        </span>
    </button>
    <button
        data-modal-target="modal-calculo" 
        data-modal-toggle="modal-calculo"
        type="button" 
        class="inline-flex mr-2 items-center 
        px-5 py-2.5 text-sm font-medium 
        text-center text-white bg-indigo-700 
        rounded-lg hover:bg-indigo-800 
        focus:ring-4 focus:outline-none 
        focus:ring-indigo-300 dark:bg-indigo-600 
        dark:hover:bg-indigo-700 
        dark:focus:ring-indigo-800">
        <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
        </svg>
        Cálculos 
        <span class="inline-flex ms-6 items-center justify-center w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
            {{ count($cicloAvaliativo['calculosPontuacaoCiclo'] ?? []) }}
        </span>
    </button>
</div>



<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Vinculos</h5>
        @isset($avaliados)
            <x-pagination.simple-pagination :paginator="$avaliados" :appends="[]" />
        @endisset
    </div>
   <div class="flow-root">
        <ul role="list" class="w-full divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($avaliados->items() as $index => $vinculo)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <div class="relative inline-flex items-center justify-center w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">JL</span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <b>{{$vinculo->nome}}</b>
                            </p>
                            @if(request()->input('expandir'))
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{$vinculo->email}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $vinculo->codigo_orgao }} - {{ $vinculo->nome_orgao }} 
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $vinculo->codigo_local_trabalho }} - {{ $vinculo->nome_local_trabalho }} 
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $vinculo->codigo_funcao }} - {{ $vinculo->nome_funcao }} 
                                </p>
                            @endif
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('avaliacao.create', [
                                'cicloAvaliativoUuid' => $cicloAvaliativo['uuid'],
                                'vinculoUuid' => $vinculo->uuid
                            ])"/>
                        </div>
                    </div>
                </li>
            @empty
                Nenhum vínculo encontrado para estas incidências
            @endforelse
        </ul>
   </div>
</div>


<x-layouts.modals.simple-modal
    :titulo="'Calculos'"
    :tamanho="6"
    :sessao="'modal-content-calculo'"
    :identificador="'modal-calculo'"
    >
    @section('modal-content-calculo')
        <h2>
            <x-layouts.buttons.action-button
                text="Criar"
                action="criar"
                color="success"
                :route="route('ciclo-avaliativo.calculo.create', ['uuid' => $cicloAvaliativo['uuid']])"
            ></x-layouts.buttons.action-button>
        </h2>

        <div class="md:w-12/12 p-2">
            <h3>Pontuação Ciclos</h3>
            @forelse ($cicloAvaliativo['calculosPontuacaoCiclo'] as $calculoPontuacaoCiclo)
                <span id="badge-{{$calculoPontuacaoCiclo['uuid']}}" class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                    {{$calculoPontuacaoCiclo['de']}} - {{$calculoPontuacaoCiclo['ate']}} - 
                    vinculo: {{ App\Enums\StatusVinculoCicloEnum::getKey((Int)$calculoPontuacaoCiclo['status_vinculo_ciclo']) }} - 
                    ciclo: {{ App\Enums\StatusCicloEnum::getKey((Int)$calculoPontuacaoCiclo['status_ciclo']) }}
                    aplicar em todos: {{$calculoPontuacaoCiclo['aplicar_todos'] ? 'Sim' : 'Não'}}
                    <button type="button" class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-xs hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300" data-dismiss-target="#badge-{{$calculoPontuacaoCiclo['uuid']}}" aria-label="Remove">
                        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Remove badge</span>
                    </button>
                </span>
                <br>
            @empty
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div>
                    <span class="font-medium">Nenhum item adicionado até o momento</b>
                    </div>
                </div>
            @endforelse
        </div>
    @endsection
</x-layouts.modals.simple-modal>


<x-layouts.modals.simple-modal
    :titulo="'Incidências'"
    :tamanho="6"
    :sessao="'modal-content-incidencia'"
    :identificador="'modal-incidencia'"
    >
    @section('modal-content-incidencia')
        <h2>
            <x-layouts.buttons.action-button
                text="Criar"
                action="criar"
                color="success"
                :route="route('ciclo-avaliativo.incidencia.create', ['uuid' => $cicloAvaliativo['uuid']])"
            ></x-layouts.buttons.action-button>
        </h2>
        <div class="flex flex-wrap -mx-3 mb-2 p-3">
            <div class="md:w-4/12 p-2">
                <h3>Órgãos</h3>
                @forelse ($cicloAvaliativo['incidencias'] as $incidencia)
                    @forelse (json_decode(json_decode($incidencia['orgaos']), true) as $data)
                    <span id="badge-{{$data['codigo_orgao']}}" class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                        {{$data['codigo_orgao']}} - {{$data['nome_orgao']}}
                        <button type="button" class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-xs hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300" data-dismiss-target="#badge-{{$data['codigo_orgao']}}" aria-label="Remove">
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Remove badge</span>
                        </button>
                    </span>
                    <br>
                    @empty
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div>
                            <span class="font-medium">Nenhum item adicionado até o momento</b>
                            </div>
                        </div>
                    @endforelse
                @empty
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div>
                        <span class="font-medium">Nenhum item adicionado até o momento</b>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="md:w-4/12 p-2">
                <h3>Locais de Trabalho</h3>
                @forelse ($cicloAvaliativo['incidencias'] as $incidencia)
                    @forelse (json_decode(json_decode($incidencia['locais_trabalho']), true) as $data)
                    <span id="badge-{{$data['codigo_local_trabalho']}}" class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                        {{$data['codigo_local_trabalho']}} - {{$data['nome_local_trabalho']}}
                        <button type="button" class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-xs hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300" data-dismiss-target="#badge-{{$data['codigo_local_trabalho']}}" aria-label="Remove">
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Remove badge</span>
                        </button>
                    </span>
                    <br>
                    @empty
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div>
                            <span class="font-medium">Nenhum item adicionado até o momento</b>
                            </div>
                        </div>
                    @endforelse
                @empty
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div>
                        <span class="font-medium">Nenhum item adicionado até o momento</b>
                        </div>
                    </div>
                @endforelse
            </div>
           
            <div class="md:w-4/12 p-2">
                <h3>Funções</h3>
                @forelse ($cicloAvaliativo['incidencias'] as $incidencia)
                    @forelse (json_decode(json_decode($incidencia['funcoes']), true) as $data)
                        <span id="badge-{{$data['codigo_funcao']}}" class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-blue-800 bg-blue-100 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                            {{$data['codigo_funcao']}} - {{$data['nome_funcao']}}
                            <button type="button" class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-xs hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300" data-dismiss-target="#badge-{{$data['codigo_funcao']}}" aria-label="Remove">
                                <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Remove badge</span>
                            </button>
                        </span>
                        <br>
                    @empty
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            {{-- <span class="sr-only">Info</span> --}}
                            <div>
                            <span class="font-medium">Nenhum item adicionado até o momento</b>
                            </div>
                        </div>
                    @endforelse
                @empty
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        {{-- <span class="sr-only">Info</span> --}}
                        <div>
                        <span class="font-medium">Nenhum item adicionado até o momento</b>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    @endsection
</x-layouts.modals.simple-modal>

<x-layouts.modals.simple-modal
    :titulo="'Modelos'"
    :tamanho="6"
    :sessao="'modal-content-modelo'"
    :identificador="'modal-modelo'"
    >
    @section('modal-content-modelo')
        <h2>
            <x-layouts.buttons.action-button
                text="Criar"
                action="criar"
                color="success"
                :route="route('ciclo-avaliativo.modelo.create', ['uuid' => $cicloAvaliativo['uuid']])"
            ></x-layouts.buttons.action-button>
        </h2>  
        <div class="grid grid-cols-4 gap-4">
            @forelse ($cicloAvaliativo['modelos'] as $modelo)
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <svg class="w-8 h-8 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m8-2h3m-3 3h3m-4 3v6m4-3H8M19 4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1ZM8 12v6h8v-6H8Z"/>
                    </svg>

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$modelo->nome}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{$modelo->descricao}}</p>
                </div>
            @empty
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    {{-- <span class="sr-only">Info</span> --}}
                    <div>
                    <span class="font-medium">Nenhum modelo adicionado até o momento</b>
                    </div>
                </div>
            @endforelse
        </div>
    @endsection
</x-layouts.modals.simple-modal>

@endsection