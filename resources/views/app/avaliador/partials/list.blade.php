<x-layouts.tables.simple-table
    :headers="[
        'Nome',
        'Email',
        'Ações'
    ]"
    :paginator="$avaliadores"
    :appends="$filters"
>
    @section('table-content')
        @foreach($avaliadores->items() as $index => $avaliador)
            <tr>
                {{-- @dd($avaliador->vinculo) --}}
                <td>{{ $avaliador->vinculo['servidor']['nome'] }}</td>
                <td>{{ $avaliador->vinculo['email'] }}</td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                    text="Ver"
                    action="ver"
                    color="secondary"
                    :route="route('avaliador.show', $avaliador->uuid)"/>
                <x-layouts.buttons.action-button
                    text="Editar"
                    action="editar"
                    color="primary"
                    :route="route('cargo.edit', $avaliador->uuid)"/>
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>
