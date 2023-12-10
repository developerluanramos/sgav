<x-layouts.modals.simple-modal :sessao="'modal-content-indicador-desempenho' . str_replace(' ', '', $fatorAvaliacao->nome)" :titulo="'Indicadores de Desempenho'" :identificador="'modalIndicadoresDesempenhoA' . str_replace(' ', '', $fatorAvaliacao->nome)">
    @section('modal-content-indicador-desempenho' . str_replace(' ', '', $fatorAvaliacao->nome))
        <form action="{{ route('indicador-desempenho.store') }}" method="POST">
            @csrf
            @include('app.modelo-avaliacao.indicadores-desempenho.partials.form', [
                "fatorAvaliacao" => $fatorAvaliacao,
                "modeloAvaliacao" => $modeloAvaliacao
            ])
        </form>
        <div>
            @include('app.modelo-avaliacao.indicadores-desempenho.partials.list-modal', ["indicadoresDesempenho" => $indicadoresDesempenho])
        </div>
    @endsection
</x-layouts.modals.simple-modal>
