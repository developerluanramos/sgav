@extends('app.layouts.app')

{{--@section('breadcrumb')--}}
{{--    {{ Breadcrumbs::render('conceito-avaliacao.create') }}--}}
{{--@endsection--}}

@section('title', 'Novo Ciclo Avaliativo')

<x-layouts.headers.create-header :title="'Novo Ciclo Avaliativo'"/>

@section('content')
    @include('app.ciclo-avaliativo.partials.stepper', ['step' => \App\Enums\CicloAvaliativoStepsEnum::CONCLUSAO])

{{--    @dd($cicloAvaliativo)--}}
    <p>Data de início das avaliações: {{ $cicloAvaliativo->periodicidade->iniciado_em }}</p>

    @php $contadorQuantidadeCiclos = 0; @endphp
    @while($cicloAvaliativo->periodicidade->quantidade_ciclos > $contadorQuantidadeCiclos)
        <p>Data início {{ $cicloAvaliativo->periodicidade->quantidade_ciclos }}</p>
        @php $contadorQuantidadeCiclos++; @endphp
    @endwhile

    <form method="POST" action="{{route('ciclo-avaliativo.dependencia.store')}}">
        @csrf
        <x-layouts.buttons.submit-button text="Salvar"/>
    </form>
@endsection
