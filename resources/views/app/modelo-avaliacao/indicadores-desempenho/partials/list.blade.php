@if($indicadores->count())
    <ul class="max-w-md ml-4 py-2 space-y-1 text-gray-700 list-disc list-inside dark:text-gray-400">
        @foreach($indicadores as $indicadorDesempenho)
            <li>
                {{ $indicadorDesempenho->descricao }}
            </li>
        @endforeach
    </ul>
@endif
