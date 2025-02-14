@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('ciclos-avaliativos') }}
@endsection

@section('title', 'Ciclo Avaliativo')

@section('content')

@include('app.ciclo-avaliativo.partials.small-view', ['cicloAvaliativo' => $cicloAvaliativo])

<div class="mt-2">
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
</div>

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
        @forelse ($cicloAvaliativo['incidencias'] as $incidencia)
            <b>{{$incidencia->uuid}}</b><br>
        @empty
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                {{-- <span class="sr-only">Info</span> --}}
                <div>
                <span class="font-medium">Nenhuma incidência adicionada até o momento</b>
                </div>
            </div>
        @endforelse
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

        @forelse ($cicloAvaliativo['modelos'] as $modelo)
            <b>{{$modelo->nome}}</b><br>
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
    @endsection
</x-layouts.modals.simple-modal>

@endsection