<x-layouts.tables.simple-table
    :headers="[
        'Descrição',
        'Quantidade de itens',
        'Data cadastro',
        'Última atualização',
        'Ações'
    ]"
    :paginator="$conceitoAvaliacao"
    :appends="$filters"
>
    @section('table-content')
        @foreach($conceitoAvaliacao->items() as $index => $conceitoAvaliacao)
            <tr>
                <td>{{ $conceitoAvaliacao->descricao }}</td>
                <td>{{ sizeof($conceitoAvaliacao->itens) }}</td>
                <td>{{$conceitoAvaliacao->created_at_for_humans}}</td>
                <td>{{$conceitoAvaliacao->updated_at_for_humans}}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('cargo.show', $conceitoAvaliacao->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('conceito-avaliacao.edit', $conceitoAvaliacao->uuid)"/>
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
