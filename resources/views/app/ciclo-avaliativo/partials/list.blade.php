<x-layouts.tables.simple-table
    :headers="[
        'Código Controle',
        'Iniciado em',
        'Status',
        'Ações'
    ]"
    :paginator="$ciclosAvaliativos"
    :appends="[]"
>
    @section('table-content')
        @foreach($ciclosAvaliativos->items() as $index => $ciclo)
            <tr>
                <td>{{$ciclo->uuid}}</td>
                <td>{{$ciclo->iniciado_em}}</td>
                <td class="p-3">
                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                        <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{random_int(25, 87)}}%">
                            {{random_int(25, 87)}}%
                        </div>
                    </div>
                </td>
                <td><x-layouts.badges.status-ciclo-avaliativo :status="$ciclo->status"/></td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                        text="Ver"
                        action="ver"
                        color="secondary"
                        :route="''"
                    />
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
