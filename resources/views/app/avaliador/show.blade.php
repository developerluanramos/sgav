@extends('app.layouts.app')

@section('title', 'Avaliador')

@section('breadcrumb')
    {{ Breadcrumbs::render('avaliador') }}
@endsection

@section('content')
{{-- @dd($avaliador->avaliados) --}}
{{-- <div class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-3 dark:bg-gray-800 dark:border-gray-700">
   <div class="flow-root"> --}}
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                            Avaliador: {{$avaliador->vinculo['servidor']['nome']}}
                        </h5>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$avaliador->vinculo['email']}}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Incluir Avaliados</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transferir Avaliados</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Importar Avaliados</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Excluir</a>
                                </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </li>
        </ul>
   {{-- </div>
</div> --}}



<div class="w-full p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-3 dark:bg-gray-800 dark:border-gray-700">
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($avaliador->avaliados as $index => $avaliado)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            {{-- <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div> --}}
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$avaliado['servidor']['nome']}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{$avaliado->email}}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                                </svg>
                                transferir
                            </button>
                            &nbsp;
                            <button type="button" class="text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                                <span class="sr-only">Icon description</span>
                            </button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
{{-- @dd($avaliador) --}}

@endsection
