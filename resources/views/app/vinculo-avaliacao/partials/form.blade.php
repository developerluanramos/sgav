<x-layouts.inputs.input-normal-text
    :label="null"
    :type="'hidden'"
    name="ciclos_uuid"
    origin="Conceito"
    lenght="12/12"
    :value="request()->input('cicloAtual') ?? $formData['cicloAvaliativoDetails']['uuids']['cicloAtual']"
/>
<x-layouts.inputs.input-normal-text
    :label="null"
    name="periodos_uuid"
    origin="Conceito"
    :type="'hidden'"
    lenght="12/12"
    :value="request()->input('periodoAtual') ?? $formData['cicloAvaliativoDetails']['uuids']['periodoAtual']"
/>
<x-layouts.inputs.input-normal-text
    :label="null"
    name="avaliacoes_uuid"
    origin="Conceito"
    :type="'hidden'"
    lenght="12/12"
    :value="request()->input('avaliacaoAtual') ?? $formData['cicloAvaliativoDetails']['uuids']['avaliacaoAtual']"
/>
@foreach ($formData['cicloAvaliativo']->modelos as $modeloIndex => $modelo)
    <h5 class="flex mb-2 text-1xl font-bold text-gray-900 dark:text-white">
        <span class="mt-1">{{$modelo->nome}}</span>
    </h5>
    {{-- <div class="p-3 bg-white rounded-lg shadow-md mt-lg"> --}}
        <ul class="mt-2 space-y-3">
            @foreach ($modelo->fatores as $fatorIndex => $fator)
                <li class="bg-gray-50 p-3 text-gray-900 rounded-lg shadow-sm border-l-4 border-green-500">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4a1 1 0 011-1h2V2zm8 1V2H6v1h8zM4 5v10h12V5H4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Fator:</span>
                        <span wire:loading.class="opacity-50" class="text-gray-500">{{ $fator->nome }}</span>
                    </div>

                    <!-- Avaliações como Badges -->
                    <ul class="pl-8 mt-2 space-y-3">
                        @foreach ($fator->indicadores as $indicadorIndex => $indicador)
                            <li class="bg-gray-50 p-3 rounded-lg shadow-sm border-l-4 border-green-500">
                                <div class="grid grid-cols-12 gap-2 content-center">
                                    <div class="col-span-8 content-center">
                                        <div class="flex items-center gap-2 mt-4"> 
                                            {{-- <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4a1 1 0 011-1h2V2zm8 1V2H6v1h8zM4 5v10h12V5H4z" clip-rule="evenodd"></path>
                                            </svg> --}}
                                            <span class="font-semibold">{{$indicadorIndex+1}}:</span>
                                            <span wire:loading.class="opacity-50" class="text-gray-500">{{ $indicador->descricao }}</span>
                                        </div>
                                    </div>
                                    <div class="col-span-4">
                                        <x-layouts.inputs.input-normal-select
                                            :label="null"
                                            name="conceitos_uuid[{{$fator->uuid}}][]"
                                            origin="Conceito"
                                            lenght="12/12"
                                            :data="$indicador->conceito->itens"
                                            :value="$conceitoItem->uuid ?? old('conceitoItem.uuid')"
                                        />
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    {{-- </div> --}}
@endforeach

<x-layouts.buttons.submit-button text="Salvar"/>