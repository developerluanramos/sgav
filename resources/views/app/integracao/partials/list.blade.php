<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Descrição',
        'URL',
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
            <td>{{$integracao->url}}</td>
            <td>{{$integracao->objeto}}</td>
            <td class="text-right content-right align-end content-end py-2">
                <form method="POST" action="{{route('integracao.sinc', ['uuid' => $integracao->uuid])}}">
                    @csrf
                    <button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-purple-500 text-white hover:bg-purple-600 transition-colors duration-200 dark:bg-purple-600 dark:hover:bg-purple-700">
                        <!-- Ícone de Sincronização -->
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                        </svg>

                        <span>Sincronizar</span>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection
</x-layouts.tables.simple-table>
