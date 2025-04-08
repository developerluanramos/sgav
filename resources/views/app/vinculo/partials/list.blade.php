<x-layouts.tables.simple-table
    :headers="[
        'Avaliador',
        'Nome',
        'Matrícula',
        'Local Trabalho',
        'Órgão',
        'Função',
        'Ações'
    ]"
    :paginator="$vinculos"
    :appends="$filters"
>

@section('table-content')
    @foreach($vinculos->items() as $index => $vinculo)
        <tr>
            <td>
                <x-layouts.badges.situacao-generico
                    :situacao="$vinculo->avaliador"
                ></x-layouts.badges.situacao-generico>
            </td>
            <td>{{ $vinculo->nome }}</td>
            <td>{{ $vinculo->matricula }}</td>
            <td>{{ $vinculo->codigo_local_trabalho }} - {{ $vinculo->nome_local_trabalho }} </td>
            <td>{{ $vinculo->codigo_orgao }} - {{ $vinculo->nome_orgao }} </td>
            <td>{{ $vinculo->codigo_funcao }} - {{ $vinculo->nome_funcao }} </td>
            <td class="text-right">
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
