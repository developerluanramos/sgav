@extends('app.layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('conceito-avaliacao.create') }}
@endsection

@section('title', 'Selecionar modelos')

{{-- <x-layouts.headers.create-header :title="'Selecionar Avaliações'"/> --}}

@section('content')
    @include('app.ciclo-avaliativo.partials.small-view', ['cicloAvaliativo' => $formData['cicloAvaliativo']])
    <form method="POST" action="{{route('ciclo-avaliativo.modelo.store', ['uuid' => $formData['ciclosAvaliativosUuid']])}}">
        @csrf
        <div class="w-full p-4 mt-2 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Selecionar Avaliações</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($formData['modelos'] as $modeloAvaliacao)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{$modeloAvaliacao['nome']}}
                                    </h5>
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$modeloAvaliacao['nome']}}
                                    <x-layouts.badges.situacao-modelo-avaliacao :situacao="$modeloAvaliacao['situacao']" />
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <label class="relative inline-flex items-center cursor-pointer mt-2">
                                    <input type="checkbox" name="modelosAvaliacaoUuid[]" value="{{$modeloAvaliacao['uuid']}}" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <x-layouts.buttons.submit-button text="Salvar"/>
    </form>

@endsection
