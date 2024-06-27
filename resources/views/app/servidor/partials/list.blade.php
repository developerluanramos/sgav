<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Data de Nascimento',
        'Ações'
    ]"
    :paginator="$servidores"
    :appends="$filters"
>

    @section('table-content')
        @foreach($servidores->items() as $index => $servidor)
            <tr>
                <td>{{ $servidor->nome }}</td>
                <td>{{ $servidor->formatted_data_nascimento }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('servidor.show', $servidor->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('servidor.edit', $servidor->uuid)"/>
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
