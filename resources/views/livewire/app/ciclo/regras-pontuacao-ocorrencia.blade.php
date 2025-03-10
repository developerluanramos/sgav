<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg mt-3">
    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Regras de Pontuação</h3>
    @foreach ($regrasPontuacao as $index => $regra)
        <div class="flex items-center gap-2 mb-3">
            <x-layouts.inputs.input-normal-text-livewire 
                :label="'De'"
                :name="'regrasPontuacao'.$index.'de'"
                :lenght="'1/12'"
                :model="'regrasPontuacao'.$index.'de'"
                :value="''"
            />
            <x-layouts.inputs.input-normal-text-livewire 
                :label="'Até'"
                :name="'regrasPontuacao'.$index.'ate'"
                :lenght="'1/12'"
                :model="'regrasPontuacao'.$index.'ate'"
                :value="''"
            />
            <x-layouts.inputs.input-normal-select-enum-livewire 
                :label="'Status Vinculo Ciclo'"
                :name="'regrasPontuacao'.$index.'statusVinculoCiclo'"
                :lenght="'2/12'"
                :model="'regrasPontuacao'.$index.'statusVinculoCiclo'"
                :data="App\Enums\StatusVinculoCicloEnum::getKeys()"
                :value="''"
            />
            <x-layouts.inputs.input-normal-select-enum-livewire 
                :label="'Status Ciclo'"
                :name="'regrasPontuacao'.$index.'statusCiclo'"
                :lenght="'2/12'"
                :model="'regrasPontuacao'.$index.'statusCiclo'"
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

    <h3 class="text-lg font-semibold mt-6 mb-4 text-gray-900 dark:text-gray-100">Regras de Ocorrências</h3>
    @foreach ($regrasOcorrencias as $index => $regra)
        <div class="flex items-center gap-2 mb-3">
            <input type="text" wire:model="regrasOcorrencias.{{ $index }}.min" placeholder="Min"
                class="border rounded-lg p-2 w-16 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            <input type="text" wire:model="regrasOcorrencias.{{ $index }}.max" placeholder="Max"
                class="border rounded-lg p-2 w-16 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
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
            <select wire:model="regrasOcorrencias.{{ $index }}.statusVinculo"
                class="border rounded-lg p-2 w-52 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">Status do vínculo no Ciclo</option>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>
            <select wire:model="regrasOcorrencias.{{ $index }}.statusCiclo"
                class="border rounded-lg p-2 w-52 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">Status do Ciclo</option>
                <option value="aberto">Aberto</option>
                <option value="fechado">Fechado</option>
            </select>
            <input type="text" wire:model="regrasOcorrencias.{{ $index }}.pontos" placeholder="Pontos"
                class="border rounded-lg p-2 w-20 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            <button wire:click="removeRegraOcorrencia({{ $index }})"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                Excluir
            </button>
        </div>
    @endforeach
    <button wire:click="addRegraOcorrencia"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
        Adicionar
    </button>
</div>
