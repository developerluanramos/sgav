@if($modeloAvaliacao->fatoresAvaliacao->count())

        @foreach($modeloAvaliacao->fatoresAvaliacao as $index => $fatorAvaliacao)
        <ul class="w-full text-sm flex flex-col mb-4 items-start font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="w-full flex px-4 py-2 uppercase font-bold border-b border-gray-200 rounded-t-lg dark:border-gray-600">

                <button type="button" class="w-full px-2 mr-2 font-medium text-left rtl:text-right border-gray-200 cursor-pointer hover:rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white" data-modal-target="modalIndicadoresDesempenhoA{{str_replace(' ', '', $fatorAvaliacao->nome)}}" data-modal-toggle="modalIndicadoresDesempenhoA{{str_replace(' ', '', $fatorAvaliacao->nome)}}">
                    {{ $fatorAvaliacao->nome }} - {{ $fatorAvaliacao->conceitoAvaliacao->descricao }}
                </button>
                @include('app.modelo-avaliacao.indicadores-desempenho.create', [
                    "fatorAvaliacao" => $fatorAvaliacao,
                    "modeloAvaliacao" => $modeloAvaliacao,
                    "indicadoresDesempenho" => $fatorAvaliacao->indicadoresDesempenho
                ])

                {{-- MODAL DE EDIT --}}
                <form method="POST" action="{{route('fator-avaliacao.update', $fatorAvaliacao->uuid)}}" class="flex ml-auto items-center">
                    @csrf
                    @method('PUT')
                    <x-layouts.modals.simple-modal :sessao="'modal-content-fator-avaliacao'" :titulo="'Edição'" :identificador="'modalFatorAvaliacao'">
                        @section('modal-content-fator-avaliacao')
                            @include('app.modelo-avaliacao.fator-avaliacao.partials.form', ["fatorAvaliacao" => $fatorAvaliacao])
                        @endsection
                    </x-layouts.modals.simple-modal>
                    <x-layouts.buttons.edit-action-button
                            color="primary"
                            :identificador="'modalFatorAvaliacao'"
                    />
                </form>

                {{-- FORM DE DELETE --}}
                <form method="POST" action="/fator-avaliacao/{{ $fatorAvaliacao->uuid }}" class="flex items-center">
                    @csrf
                    @method('DELETE')
                    <div class="m-1"></div>
                    <x-layouts.buttons.submit-delete-button
                        color="danger"/>
                </form>
            </li>
            {{-- LISTAGEM DE INDICADORES --}}
            @include('app.modelo-avaliacao.indicadores-desempenho.partials.list', [
                "indicadoresDesempenho" => $fatorAvaliacao->indicadoresDesempenho
            ])
        </ul>
        @endforeach

@endif



