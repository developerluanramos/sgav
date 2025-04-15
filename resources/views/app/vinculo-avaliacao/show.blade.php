@extends('app.layouts.app')

@section('title', 'Vinculo Avaliação')

@section('content')
    {{'TESTE VISUALIZAÇÃO AV. DESEMPENHO'}}
    <table border="1">
        <thead>
            <tr>
                <th>Ciclo</th>
                <th>Período</th>
                <th>Avaliação</th>
                <th>Pontos</th>
                <th>Status Avaliação</th>
                <th>Status Vinculo Avaliação</th>
                <th>Status Período</th>
                <th>Status Vinculo Período</th>
                <th>Status Ciclo</th>
                <th>Status Vinculo Ciclo</th>
            </tr>
        </thead>
        <tbody>
        @forelse($formData["vinculoAvaliacaoDetails"]["avaliacoesConcluidas"] as $avaliacao)
            <tr>
                <td>{{$avaliacao->ciclos_uuid}}</td>
                <td>{{$avaliacao->periodos_uuid}}</td>
                <td>{{$avaliacao->avaliacoes_uuid}}</td>
                <td>{{$avaliacao->pontuacao_total}}</td>
                <td>{{$avaliacao->status_vinculo_avaliacao}} - {{\App\Enums\StatusVinculoAvaliacaoEnum::getKey((int)$avaliacao->status_vinculo_avaliacao)}}</td>
                <td>{{$avaliacao->status_avaliacao}} - {{\App\Enums\StatusAvaliacaoEnum::getKey((int)$avaliacao->status_avaliacao)}}</td>
                <td>{{$avaliacao->status_vinculo_periodo}} - {{\App\Enums\StatusVinculoPeriodoEnum::getKey((int)$avaliacao->status_vinculo_periodo)}}</td>
                <td>{{$avaliacao->status_periodo}} - {{\App\Enums\StatusPeriodoEnum::getKey((int)$avaliacao->status_periodo)}}</td>
                <td>{{$avaliacao->status_vinculo_ciclo}} - {{\App\Enums\StatusVinculoCicloEnum::getKey((int)$avaliacao->status_vinculo_ciclo)}}</td>
                <td>{{$avaliacao->status_ciclo}} - {{\App\Enums\StatusCicloEnum::getKey((int)$avaliacao->status_ciclo)}}</td>
            </tr>
        @empty
            <h4>Nenhuma avaliação concluida</h4>
        @endforelse
        </tbody>
    </table>


    @dd($formData["vinculoAvaliacaoDetails"]["avaliacoesConcluidas"])
@endsection
