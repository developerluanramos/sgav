<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        // 'Email',
        'Local Trabalho',
        'Órgão',
        'Função',
        'Data de Admissão',
        'Matrícula',
        'Ações'
    ]"
    :paginator="$vinculos"
    :appends="$filters"
>

@section('table-content')
    @foreach($vinculos->items() as $index => $vinculo)
        <tr>
            <td>{{ $vinculo->nome }}</td>
            {{-- <td>{{ $vinculo->email }}</td> --}}
            <td>{{ $vinculo->codigo_local_trabalho }} - {{ $vinculo->nome_local_trabalho }} </td>
            <td>{{ $vinculo->codigo_orgao }} - {{ $vinculo->nome_orgao }} </td>
            <td>{{ $vinculo->codigo_funcao }} - {{ $vinculo->nome_funcao }} </td>
            <td>{{ $vinculo->formatted_data_admissao }}</td>
            <td>{{ $vinculo->matricula }}</td>
            <td class="text-right">
                {{-- <x-layouts.buttons.action-button
                    text="Excluir"
                    action="excluir"
                    color="danger"
                    :identificador="'drawer-delete-confirmacao'"
                    :route="route('vinculo.delete', [
                            'uuid' => $vinculo->uuid
                        ])"
                /> --}}
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('vinculo.edit', $vinculo->uuid)"/>
            </td>
        </tr>
    @endforeach
@endsection
</x-layouts.tables.simple-table>
