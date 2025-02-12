<div>
    <div class="flex flex-wrap -mx-3 mb-2 p-3">
        {{-- <x-layouts.inputs.input-date
            label="Data de início do ciclo"
            name="iniciado_em"
            lenght="3/12"
            :value="$peridodicidade->iniciado_em ?? old('iniciado_em')"
        /> --}}
        <input
            type="date"
            wire:model.live.debounce.500ms="iniciado_em"
            name="iniciado_em"
            id="iniciado_em"
            class="appearance-none 
            md:w-3/12 
            block w-full bg-gray-200 
            text-gray-700 border border-gray-200 rounded py-3 
            px-4 leading-tight focus:outline-none 
            focus:bg-white focus:border-gray-500"
        />
    </div>
    <div class="flex flex-wrap -mx-3 mb-2 mt-6">
        {{-- <x-layouts.inputs.input-normal-number
            label="Quantidade de ciclos"
            name="quantidade_ciclos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_ciclos ?? old('quantidade_ciclos')"
        /> --}}
        <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="quantidade_ciclos">
                Quantidade Ciclos
            </label>
            <input
                type="number"
                wire:model.live.debounce.500ms="quantidade_ciclos"
                name="quantidade_ciclos"
                id="quantidade_ciclos"
                class="appearance-none 
                block w-full bg-gray-200 
                text-gray-700 border border-gray-200 rounded py-3 
                px-4 leading-tight focus:outline-none 
                focus:bg-white focus:border-gray-500"
            />
        </div>
        {{-- <x-layouts.inputs.input-normal-number
            label="Quantidade unidades"
            name="quantidade_unidade_ciclos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_unidade_ciclos ?? old('quantidade_unidade_ciclos')"
        /> --}}
        <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="quantidade_unidade_ciclos">
                Quantidade de Unidades
            </label>
            <input
                type="number"
                wire:model.live.debounce.500ms="quantidade_unidade_ciclos"
                name="quantidade_unidade_ciclos"
                id="quantidade_unidade_ciclos"
                class="appearance-none 
                block w-full bg-gray-200 
                text-gray-700 border border-gray-200 rounded py-3 
                px-4 leading-tight focus:outline-none 
                focus:bg-white focus:border-gray-500"
            />
        </div>
        <x-layouts.inputs.input-normal-select-enum
            label="Unidade do ciclo"
            name="unidade_ciclos"
            lenght="2/12"
            :data="$formData['unidadesPeriodicidade']"
            :value="$peridodicidade->iniciado_em ?? old('iniciado_em')"
        />
        {{-- <x-layouts.inputs.input-normal-number
            label="Quantidade de períodos"
            name="quantidade_periodos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_periodos ?? old('quantidade_periodos')"
        /> --}}
        <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="quantidade_periodos">
                Quantidade Períodos
            </label>
            <input
                type="number"
                wire:model.live.debounce.500ms="quantidade_periodos"
                name="quantidade_periodos"
                id="quantidade_periodos"
                class="appearance-none 
                block w-full bg-gray-200 
                text-gray-700 border border-gray-200 rounded py-3 
                px-4 leading-tight focus:outline-none 
                focus:bg-white focus:border-gray-500"
            />
        </div>
        {{-- <x-layouts.inputs.input-normal-number
            label="Quantidade unidades"
            name="quantidade_unidade_periodos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_unidade_periodos ?? old('quantidade_unidade_periodos')"
        /> --}}
        <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
            <label 
                class="block uppercase tracking-wide
                text-xs font-bold mb-2"
                for="quantidade_unidade_periodos">
                Quantidade Unidades
            </label>
            <input
                type="number"
                wire:model.live.debounce.500ms="quantidade_unidade_periodos"
                name="quantidade_unidade_periodos"
                id="quantidade_unidade_periodos"
                class="appearance-none
                block w-full bg-gray-200
                text-gray-700 border border-gray-200 rounded py-3
                px-4 leading-tight focus:outline-none
                focus:bg-white focus:border-gray-500"
            />
        </div>
        <x-layouts.inputs.input-normal-select-enum
            label="Unidade do período"
            name="unidade_periodos"
            lenght="2/12"
            :data="$formData['unidadesPeriodicidade']"
            :value="$peridodicidade->unidade_periodos ?? old('unidade_periodos')"
        />
    </div>
 
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Ciclos Avaliativos</h2>
        
        <ul class="list-decimal pl-6 space-y-4 text-gray-800">
            @foreach ($ciclo_avaliativo as $cicloIndex => $ciclo)
                <li class="pb-4 border-l-4 border-blue-500 pl-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 3a1 1 0 011-1h6a1 1 0 011 1v1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V5a1 1 0 011-1h2V3zm8 1V3H6v1h8zM4 6v10h12V6H4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Ciclo {{ $cicloIndex + 1 }}:</span>
                        <span wire:loading.class="opacity-50" class="text-gray-500">{{ \Carbon\Carbon::parse($ciclo['iniciado_em'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($ciclo['finalizado_em'])->format('d/m/Y') }}</span>
                    </div>
    
                    <ul class="list-disc pl-6 mt-2 space-y-3">
                        @foreach ($ciclo['periodos'] as $periodoIndex => $periodo)
                            <li class="bg-gray-50 p-3 rounded-lg shadow-sm border-l-4 border-green-500">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4a1 1 0 011-1h2V2zm8 1V2H6v1h8zM4 5v10h12V5H4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="font-semibold">Período {{ $cicloIndex + 1 }}.{{ $periodoIndex + 1 }}:</span>
                                    <span wire:loading.class="opacity-50" class="text-gray-500">{{ \Carbon\Carbon::parse($periodo['iniciado_em'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($periodo['finalizado_em'])->format('d/m/Y') }}</span>
                                </div>
    
                                <!-- Avaliações como Badges -->
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach ($periodo['avaliacoes'] as $avaliacaoIndex => $avaliacao)
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-lg">
                                            {{ 'teste' }}
                                        </span>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>  
</div>

