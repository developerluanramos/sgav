<x-layouts.tables.simple-table
    :headers="[
        'Código Controle',
        'Descrição',
        'Data de início',
        'Data final',
        'Status',
        'Progresso',
        'Ações'
    ]"
    :paginator="$ciclosAvaliativos"
    :appends="[]"
>
    @section('table-content')
        @foreach($ciclosAvaliativos->items() as $index => $ciclo)
            <tr>
                <td>{{$ciclo->uuid}}</td>
                <td>{{$ciclo->descricao}}</td>
                <td>{{$ciclo->iniciado_em}}</td>
                <td>{{$ciclo->finalizado_em}}</td>
                <td><x-layouts.badges.status-ciclo-avaliativo :status="$ciclo->status"/></td>
                <td class="p-3">
                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                        <div 
                            class="bg-blue-600 text-xs 
                            font-medium text-blue-100 
                            text-center p-0.5 
                            leading-none 
                            rounded-full" 
                            style="width: {{random_int(25, 87)}}%">
                                {{random_int(25, 87)}}%
                        </div>
                    </div>
                </td>
                <td class="text-right">
                    <a href="{{route('ciclo-avaliativo.incidencia.create', ['uuid' => $ciclo->uuid])}}" title="INCIDÊNCIA" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10.83 5a3.001 3.001 0 0 0-5.66 0H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17ZM4 11h9.17a3.001 3.001 0 0 1 5.66 0H20a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H4a1 1 0 1 1 0-2Zm1.17 6H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17a3.001 3.001 0 0 0-5.66 0Z"/>
                        </svg> 
                    </a>
                    <a href="{{route('ciclo-avaliativo.show', ['uuid' => $ciclo->uuid])}}" title="FORMULÁRIOS DE AVALIAÇÃO" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z" clip-rule="evenodd"/>
                        </svg>                           
                    </a>
                    {{-- <x-layouts.buttons.action-button
                        text="Ver"
                        action="ver"
                        color="secondary"
                        :route="route('ciclo-avaliativo.show', ['uuid' => $ciclo->uuid])"
                    /> --}}
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
