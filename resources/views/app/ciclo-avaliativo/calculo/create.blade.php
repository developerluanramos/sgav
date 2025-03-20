@extends('app.layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('conceito-avaliacao.create') }}
@endsection

@section('title', 'Nova Configuração de Cálculo')

@section('content')
    @include('app.ciclo-avaliativo.partials.small-view', ['cicloAvaliativo' => $formData['cicloAvaliativo']])
    <form method="POST" action="{{route('ciclo-avaliativo.calculo.store', ['uuid' => $formData['ciclosAvaliativosUuid']])}}">
        @csrf
        
        @if ($errors->any())
            <div class="mt-2 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-4">
                <p class="font-bold">Erros encontrados:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <livewire:app.ciclo.regras-pontuacao />
        
        <livewire:app.periodo.regras-pontuacao />

        <livewire:app.avaliacao.regras-pontuacao />

        <x-layouts.buttons.submit-button text="Salvar"/>
    </form>
@endsection
