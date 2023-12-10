@if($indicadoresDesempenho->count())
    <ul class="w-full px-4 py-2 space-y-1 text-gray-700 list-inside dark:text-gray-400">
        @foreach($indicadoresDesempenho as $indicadorDesempenho)
            <li class="flex items-center justify-between">
                <span>{{ $indicadorDesempenho->descricao }}</span>
                <div class="flex items-center justify-end space-x-1">
                    <x-layouts.buttons.edit-action-button
                    color="primary"
                    :identificador="'modalFatorAvaliacao'"
                    />
                    <x-layouts.buttons.submit-delete-button
                    color="danger"
                    />
                </div>
            </li>
        @endforeach
    </ul>
@endif
