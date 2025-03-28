<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Descrição',
        'Objeto',
        'Opções'
    ]"
    :paginator="null"
    :appends="$filters"
>
@section('table-content')
    @foreach($integracoes as $index => $integracao)
        <tr>
            <td>{{$integracao->uuid}}</td>
            <td>{{$integracao->descricao}}</td>
            <td>{{$integracao->objeto}}</td>
            <td class="text-right content-right align-end content-end py-2">
                <form method="POST" action="{{route('integracao.sinc', ['uuid' => $integracao->uuid])}}">
                    @csrf
                    <button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-purple-500 text-white hover:bg-purple-600 transition-colors duration-200 dark:bg-purple-600 dark:hover:bg-purple-700">
                        <!-- Ícone de Sincronização -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            @csrf  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span>Sincronizar</span>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection
</x-layouts.tables.simple-table>