@extends('app.layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('conceito-avaliacao.create') }}
@endsection

@section('title', 'Nova Configuração de Cálculo')

@section('content')
    @include('app.ciclo-avaliativo.partials.small-view', ['cicloAvaliativo' => $formData['cicloAvaliativo']])
    
    <livewire:app.ciclo.regras-pontuacao-ocorrencia />
@endsection
