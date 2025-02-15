<ul class="space-y-3 text-sm">
    @foreach ($cicloAvaliativo->ciclos as $cicloIndex => $ciclo)
        <li class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm border dark:border-gray-700">
            <span class="flex items-center text-blue-700 dark:text-blue-300 font-semibold">
                <svg class="w-5 h-5 mr-2 text-blue-500 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.5 0 2.5-1 2.5-2.5S13.5 3 12 3s-2.5 1-2.5 2.5S10.5 8 12 8zM3 21v-6c0-2.5 2.5-4 5-4h8c2.5 0 5 1.5 5 4v6"/>
                </svg>
                <span class="truncate">Ciclo {{ $cicloIndex + 1 }}</span>
            </span>
            <span class="block text-gray-600 dark:text-gray-400 text-xs mt-1">
                {{ date('d/m/Y', strtotime($ciclo->iniciado_em)) }} - {{ date('d/m/Y', strtotime($ciclo->finalizado_em)) }}
            </span>

            <ul class="mt-2 space-y-2">
                @foreach ($ciclo->periodos as $periodoIndex => $periodo)
                    <li class="bg-indigo-50 dark:bg-indigo-900 p-2 rounded-md border-l-4 border-indigo-500">
                        <span class="flex items-center text-indigo-700 dark:text-indigo-300 font-medium">
                            <svg class="w-4 h-4 mr-2 text-indigo-600 dark:text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 18V3M3 21v-6a2 2 0 012-2h14a2 2 0 012 2v6"/>
                            </svg>
                            Período {{ $periodoIndex + 1 }}
                        </span>
                        <span class="block text-gray-500 dark:text-gray-400 text-xs mt-1">
                            {{ date('d/m/Y', strtotime($periodo->iniciado_em)) }} - {{ date('d/m/Y', strtotime($periodo->finalizado_em)) }}
                        </span>

                        <ul class="mt-2 space-y-1">
                            @foreach ($periodo->avaliacoes as $avaliacaoIndex => $avaliacao)
                                <li class="bg-purple-50 dark:bg-purple-900 p-2 rounded-md border-l-4 border-purple-500">
                                    <span class="flex items-center text-purple-700 dark:text-purple-300 text-xs">
                                        <svg class="w-4 h-4 mr-2 text-purple-600 dark:text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        {{ date('d/m/Y', strtotime($avaliacao->iniciado_em)) }} - {{ date('d/m/Y', strtotime($avaliacao->finalizado_em)) }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>