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
                :name="'regrasPontuacao.'.$index.'.status_vinculo_ciclo'"
                :lenght="'2/12'"
                :model="'regrasPontuacao.'.$index.'.status_vinculo_ciclo'"
                :data="App\Enums\StatusVinculoCicloEnum::getKeys()"
                :value="''"
            />
            <x-layouts.inputs.input-normal-select-enum-livewire 
                :label="'Status Ciclo'"
                :name="'regrasPontuacao.'.$index.'.status_ciclo'"
                :lenght="'2/12'"
                :model="'regrasPontuacao.'.$index.'.status_ciclo'"
                :data="App\Enums\StatusCicloEnum::getKeys()"
                :value="''"
            />
            <button wire:click="removeRegraPontuacao({{ $index }})"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg mt-4">
                Excluir
            </button>
        </div>
    @endforeach
    <button type="button" wire:click="addRegraPontuacao"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg ml-3">
        Adicionar
    </button>
    <input type="text" name="regras_pontuacao_ciclo" value="{{json_encode($regrasPontuacao)}}">
</div>
