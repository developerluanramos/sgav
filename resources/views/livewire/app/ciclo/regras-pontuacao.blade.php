<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg mt-3">
    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Regras de Pontuação do Ciclo</h3>
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
            <div class="w-full md:w-2/12 mb-1 md:mb-0" style="margin-top: -22px">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2">
                    Aplicar em todos
                </label>
                <label for="aplicar_todos_{{ $index }}" class="flex px-3 items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox"
                            id="aplicar_todos_{{ $index }}"
                            wire:model.live="regrasPontuacao.{{ $index }}.aplicar_todos"
                            class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-300 rounded-full peer-checked:bg-blue-500 peer-checked:ring-2 peer-checked:ring-blue-300 transition"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition peer-checked:translate-x-5 shadow-md"></div>
                    </div>
                </label>
            </div>
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
