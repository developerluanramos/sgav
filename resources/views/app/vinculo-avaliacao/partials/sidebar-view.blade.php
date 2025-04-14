<ul class="space-y-3 text-sm">
    @foreach ($cicloAvaliativo->ciclos as $cicloIndex => $ciclo)
        @php
            $cor = "gray";
            if ($formData['cicloAvaliativoDetails']['cicloAtual']->uuid == $ciclo->uuid) {
                $cor = "blue";
            } else if(in_array( $ciclo, $formData['cicloAvaliativoDetails']['ciclosPassados'])) {
                $cor = "yellow";
            } else if(in_array($periodo->uuid, $formData['vinculoAvaliacaoDetails']['uuids']['ciclosConcluidos'])) {
                $cor = "green";
            }
        @endphp

        <li class="bg-white bg-gray-800 dark:bg-gray-800 p-3 rounded-lg shadow-sm border dark:border-{{$cor}}-700">
            <span class="flex items-center text-{{$cor}}-700 dark:text-{{$cor}}-300 font-semibold">
                <svg class="w-4 h-4 mr-2 text-{{$cor}}-600 dark:text-{{$cor}}-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
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
                        }
                        if(in_array($periodo->uuid, $formData['cicloAvaliativoDetails']['uuids']['periodosPassados'])) {
                            $cor = "yellow";
                        }
                        if(in_array($periodo->uuid, $formData['vinculoAvaliacaoDetails']['uuids']['periodosConcluidos'])) {
                            $cor = "green";
                        }
                    @endphp

                    <li class="bg-{{$cor}}-50 dark:bg-{{$cor}}-900 p-2 rounded-md border-l-4 border-{{$cor}}-500">
                        <span class="flex items-center text-{{$cor}}-700 dark:text-{{$cor}}-300 font-medium">
                            <svg class="w-4 h-4 mr-2 text-{{$cor}}-600 dark:text-{{$cor}}-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
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
                                $icon = '<svg class="w-4 h-4 mr-2 text-'.$cor.'-600 dark:text-'.$cor.'-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                         </svg>';
                                $route = route('avaliacao.create', [
                                    'cicloAvaliativoUuid' => $formData['cicloAvaliativo']->uuid,
                                    'vinculoUuid' => $formData['vinculo']->uuid,
                                    'cicloAtual' => $ciclo->uuid,
                                    'periodoAtual' => $periodo->uuid,
                                    'avaliacaoAtual' => $avaliacao->uuid,
                                ]);

                                if ($formData['cicloAvaliativoDetails']['avaliacaoAtual']->uuid  == $avaliacao->uuid) {
                                    $cor = "blue";
                                    $icon = '';
                                    $route = route('avaliacao.create', [
                                        'cicloAvaliativoUuid' => $formData['cicloAvaliativo']->uuid,
                                        'vinculoUuid' => $formData['vinculo']->uuid,
                                        'cicloAtual' => $ciclo->uuid,
                                        'periodoAtual' => $periodo->uuid,
                                        'avaliacaoAtual' => $avaliacao->uuid,
                                    ]);
                                }
                                if(in_array($avaliacao->uuid, $formData['cicloAvaliativoDetails']['uuids']['avaliacoesPassadas'])) {
                                    $cor = "yellow";
                                    $icon = '<svg class="w-4 h-4 mr-2 text-'.$cor.'-600 dark:text-'.$cor.'-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>';
                                    $route = route('avaliacao.create', [
                                        'cicloAvaliativoUuid' => $formData['cicloAvaliativo']->uuid,
                                        'vinculoUuid' => $formData['vinculo']->uuid,
                                        'cicloAtual' => $ciclo->uuid,
                                        'periodoAtual' => $periodo->uuid,
                                        'avaliacaoAtual' => $avaliacao->uuid,
                                    ]);
                                }
                                if(in_array($avaliacao->uuid, $formData['vinculoAvaliacaoDetails']['uuids']['avaliacoesConcluidas'])) {
                                    $cor = "green";
                                    $icon = '<svg class="w-4 h-4 mr-2 text-'.$cor.'-600 dark:text-'.$cor.'-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>';
                                    $route = route('avaliacao.create', [
                                        'cicloAvaliativoUuid' => $formData['cicloAvaliativo']->uuid,
                                        'vinculoUuid' => $formData['vinculo']->uuid,
                                        'cicloAtual' => $ciclo->uuid,
                                        'periodoAtual' => $periodo->uuid,
                                        'avaliacaoAtual' => $avaliacao->uuid,
                                    ]);
                                }
                            @endphp
                                <li class="bg-{{$cor}}-50 dark:bg-{{$cor}}-900 p-2 rounded-md border-l-4 border-{{$cor}}-500">
                                    <a href="{{$route}}">
                                        <span class="flex items-center text-{{$cor}}-700 dark:text-{{$cor}}-300 text-xs">
                                            {!! $icon !!}
                                            {{ date('d/m/Y', strtotime($avaliacao->iniciado_em)) }} - {{ date('d/m/Y', strtotime($avaliacao->finalizado_em)) }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
