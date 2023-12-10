<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Email',
        'Data de Nascimento',
        'Data de Admissão',
        'Cargo',
        'Equipe',
        'Matrícula',
        'Ações'
    ]"
    :paginator="$servidores"
    :appends="$filters"
>

    @section('table-content')
        @foreach($servidores->items() as $index => $servidor)
            <tr>
                <td>{{ $servidor->nome }}</td>
                <td>{{ $servidor->email }}</td>
                <td>{{ $servidor->formatted_data_nascimento }}</td>
                <td>{{ $servidor->formatted_data_admissao }}</td>
                <td>{{ $servidor->cargo['nome'] }}</td>
                <td>{{ $servidor->equipe['nome'] }}</td>
                <td>{{ $servidor->matricula }}</td>
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
