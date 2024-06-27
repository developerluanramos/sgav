@extends('app.layouts.app')

{{--@section('breadcrumb')--}}
{{--    {{ Breadcrumbs::render('conceito-avaliacao.create') }}--}}
{{--@endsection--}}

@section('title', 'Novo Ciclo Avaliativo')

<x-layouts.headers.create-header :title="'Novo Ciclo Avaliativo'"/>

@section('content')
    @include('app.ciclo-avaliativo.partials.stepper', ['step' => \App\Enums\CicloAvaliativoStepsEnum::TEMPLATE])
    <form method="POST" action="{{route('ciclo-avaliativo.template.store', ['ciclosAvaliativosUuid' => $formData['ciclosAvaliativosUuid']])}}">
        @csrf
        @dump($formData)
        <div class="flex flex-wrap -mx-3 mb-2 p-2">
            @foreach ($formData['modelos'] as $modeloAvaliacao)
                <div class="md:w-3/12 mb-2 px-3 mb-6 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <x-layouts.badges.situacao-modelo-avaliacao :situacao="$modeloAvaliacao['situacao']" />
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{$modeloAvaliacao['nome']}}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $modeloAvaliacao['finalidade'] }}
                    </p>
                    <p>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                            {{ count($modeloAvaliacao['fatores_avaliacao']) }} fator(es)
                        </span>
                    </p>
                    {{-- <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a> --}}
                    <label class="relative inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" name="modelosAvaliacaoUuid[]" value="{{$modeloAvaliacao['uuid']}}" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        {{-- <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Toggle me</span> --}}
                    </label>
                </div>
            @endforeach
        </div>
        <x-layouts.buttons.submit-button text="Salvar"/>
    </form>
@endsection
