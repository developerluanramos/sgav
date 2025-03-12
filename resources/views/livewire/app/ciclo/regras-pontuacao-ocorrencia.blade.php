<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg mt-3">
    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Ciclo Regras de Pontuação</h3>
    @foreach ($regrasPontuacao as $index => $regra)
        <div class="flex items-center gap-2 mb-3">
            <x-layouts.inputs.input-normal-text-livewire 
                :label="'De'"
                :name="'regrasPontuacao.'.$index.'.de'"
                :lenght="'1/12'"
                :model="'regrasPontuacao.'.$index.'.de'"
                :value="''"
            />
            <x-layouts.inputs.input-normal-text-livewire 
                :label="'Até'"
                :name="'regrasPontuacao.'.$index.'.ate'"
                :lenght="'1/12'"
                :model="'regrasPontuacao.'.$index.'.ate'"
                :value="''"
            />
            <x-layouts.inputs.input-normal-select-enum-livewire 
                :label="'Status Vinculo Ciclo'"
                :name="'regrasPontuacao.'.$index.'.statusVinculoCiclo'"
                :lenght="'2/12'"
                :model="'regrasPontuacao.'.$index.'.statusVinculoCiclo'"
                :data="App\Enums\StatusVinculoCicloEnum::getKeys()"
                :value="''"
            />
            <x-layouts.inputs.input-normal-select-enum-livewire 
                :label="'Status Ciclo'"
                :name="'regrasPontuacao.'.$index.'.statusCiclo'"
                :lenght="'2/12'"
                :model="'regrasPontuacao.'.$index.'.statusCiclo'"
                :data="App\Enums\StatusCicloEnum::getKeys()"
                :value="''"
            />
            <button wire:click="removeRegraPontuacao({{ $index }})"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg mt-4">
                Excluir
            </button>
        </div>
    @endforeach
    <button wire:click="addRegraPontuacao"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg ml-3">
        Adicionar
    </button>
    <input type="text" name="regrasPontuacaoCiclo" value="{{json_encode($regrasPontuacao)}}">
    {{-- <h3 class="text-lg font-semibold mt-6 mb-4 text-gray-900 dark:text-gray-100">Regras de Ocorrências</h3>
    @foreach ($regrasOcorrencias as $index => $regra)
        <div class="flex items-center gap-2 mb-3">
            <x-layouts.inputs.input-normal-text-livewire 
                :label="'Min'"
                :name="'regrasOcorrencias'.$index.'min'"
                :lenght="'1/12'"
                :model="'regrasOcorrencias'.$index.'min'"
                :value="''"
            />
            <x-layouts.inputs.input-normal-text-livewire 
                :label="'Max'"
                :name="'regrasOcorrencias'.$index.'max'"
                :lenght="'1/12'"
                :model="'regrasOcorrencias'.$index.'max'"
                :value="''"
            />
            <select wire:model="regrasOcorrencias.{{ $index }}.tipo"
                class="border rounded-lg p-2 w-40 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">Tipo ocorrência</option>
                <option value="leve">Leve</option>
                <option value="grave">Grave</option>
            </select>
            <select wire:model="regrasOcorrencias.{{ $index }}.ocorrencia"
                class="border rounded-lg p-2 w-40 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">Ocorrência</option>
                <option value="falta">Falta</option>
                <option value="atraso">Atraso</option>
            </select>
            <x-layouts.inputs.input-normal-select-enum-livewire
                :label="'Status Vinculo Ciclo'"
                :name="'regrasOcorrencias'.$index.'statusVinculoCiclo'"
                :lenght="'2/12'"
                :model="'regrasOcorrencias'.$index.'statusVinculoCiclo'"
                :data="App\Enums\StatusVinculoCicloEnum::getKeys()"
                :value="''"
            />
            <x-layouts.inputs.input-normal-select-enum-livewire 
                :label="'Status Ciclo'"
                :name="'regrasOcorrencias'.$index.'statusCiclo'"
                :lenght="'2/12'"
                :model="'regrasOcorrencias'.$index.'statusCiclo'"
                :data="App\Enums\StatusCicloEnum::getKeys()"
                :value="''"
            />
            <x-layouts.inputs.input-normal-text-livewire 
                :label="'Pontos'"
                :name="'regrasOcorrencias'.$index.'pontos'"
                :lenght="'1/12'"
                :model="'regrasOcorrencias'.$index.'pontos'"
                :value="''"
            />
            <button wire:click="removeRegraOcorrencia({{ $index }})"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg mt-4">
                Excluir
            </button>
        </div>
    @endforeach --}}
    {{-- <button wire:click="addRegraOcorrencia"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg ml-3">
        Adicionar
    </button> --}}
</div>
