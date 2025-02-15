<ul class="space-y-3 text-sm">
    @foreach ($cicloAvaliativo->ciclos as $cicloIndex => $ciclo)
        @php 
            $cor = "gray";
            if ($formData['cicloAvaliativoDetails']['cicloAtual']->uuid == $ciclo->uuid) {
                $cor = "blue";
            } else if(in_array( $ciclo, $formData['cicloAvaliativoDetails']['ciclosPassados'])) {
                $cor = "yellow";
            }
        @endphp
       
        <li class="bg-white bg-gray-800 dark:bg-gray-800 p-3 rounded-lg shadow-sm border dark:border-{{$cor}}-700">
            <span class="flex items-center text-{{$cor}}-700 dark:text-{{$cor}}-300 font-semibold">
                <svg class="w-5 h-5 mr-2 text-{{$cor}}-500 dark:text-{{$cor}}-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.5 0 2.5-1 2.5-2.5S13.5 3 12 3s-2.5 1-2.5 2.5S10.5 8 12 8zM3 21v-6c0-2.5 2.5-4 5-4h8c2.5 0 5 1.5 5 4v6"/>
                </svg>
                <span class="truncate">Ciclo {{ $cicloIndex + 1 }}</span>
            </span>
            <span class="block text-gray-600 dark:text-gray-400 text-xs mt-1">
                {{ date('d/m/Y', strtotime($ciclo->iniciado_em)) }} - {{ date('d/m/Y', strtotime($ciclo->finalizado_em)) }}
            </span>

            <ul class="mt-2 space-y-2">
                @foreach ($ciclo->periodos as $periodoIndex => $periodo)
                    @php 
                        $cor = "gray";
                        if ($formData['cicloAvaliativoDetails']['periodoAtual']->uuid == $periodo->uuid) {
                            $cor = "blue";
                        } else if(in_array($periodo->uuid, $formData['cicloAvaliativoDetails']['uuids']['periodosPassados'])) {
                            $cor = "yellow";
                        }
                    @endphp

                    <li class="bg-{{$cor}}-50 dark:bg-{{$cor}}-900 p-2 rounded-md border-l-4 border-{{$cor}}-500">
                        <span class="flex items-center text-{{$cor}}-700 dark:text-{{$cor}}-300 font-medium">
                            <svg class="w-4 h-4 mr-2 text-{{$cor}}-600 dark:text-{{$cor}}-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 18V3M3 21v-6a2 2 0 012-2h14a2 2 0 012 2v6"/>
                            </svg>
                            Período {{ $periodoIndex + 1 }}
                        </span>
                        <span class="block text-{{$cor}}-500 dark:text-{{$cor}}-400 text-xs mt-1">
                            {{ date('d/m/Y', strtotime($periodo->iniciado_em)) }} - {{ date('d/m/Y', strtotime($periodo->finalizado_em)) }}
                        </span>

                        <ul class="mt-2 space-y-1">
                            @foreach ($periodo->avaliacoes as $avaliacaoIndex => $avaliacao)
                            @php 
                                $cor = "gray";
                                if ($formData['cicloAvaliativoDetails']['avaliacaoAtual']->uuid  == $avaliacao->uuid) {
                                    $cor = "blue";
                                } else if(in_array($avaliacao->uuid, $formData['cicloAvaliativoDetails']['uuids']['avaliacoesPassadas'])) {
                                    $cor = "yellow";
                                }
                            @endphp
                                <li class="bg-{{$cor}}-50 dark:bg-{{$cor}}-900 p-2 rounded-md border-l-4 border-{{$cor}}-500">
                                    <span class="flex items-center text-{{$cor}}-700 dark:text-{{$cor}}-300 text-xs">
                                        <svg class="w-4 h-4 mr-2 text-{{$cor}}-600 dark:text-{{$cor}}-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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