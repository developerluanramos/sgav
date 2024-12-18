<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-select-name
        label="Servidor"
        name="servidor_uuid"
        origin="servidor_uuid"
        lenght="12/12"
        :data="$formData['servidores']"
        :value="$vinculo->servidor_uuid ?? old('servidor_uuid')"
    />
</div>

<div>
    @livewire('components.select-boxes.estrutura-organizacional', [
        'components' => ['departamentos', 'setores', 'postos_trabalho'],
            'departamentoUuid' => $vinculo->departamentos_uuid ?? old('departamentoUuid'),
            'setorUuid' => $vinculo->setores_uuid ?? old('setorUuid'),
            'postoTrabalhoUuid' => $vinculo->postos_trabalho_uuid ?? old('postoTrabalhoUuid'),
    ])
</div>

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-select
        label="Equipe"
        name="equipe_uuid"
        origin="equipe_uuid"
        lenght="4/12"
        :data="$formData['equipes']"
        :value="$vinculo->equipe_uuid ?? old('equipe_uuid')"
    />

    <x-layouts.inputs.input-normal-select
        label="Cargo"
        name="cargo_uuid"
        origin="cargo_uuid"
        lenght="4/12"
        :data="$formData['cargos']"
        :value="$vinculo->cargo_uuid ?? old('equipe_uuid')"
    />

    <x-layouts.inputs.input-normal-text
        label="Email"
        name="email"
        lenght="4/12"
        :value="$vinculo->email ?? old('email')"
    />
</div>

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-date
        label="Data de Admissão"
        name="data_admissao"
        lenght="4/12"
        :value="$vinculo->data_admissao ?? old('data_admissao')"
    />

    <x-layouts.inputs.input-normal-text
        label="Matrícula"
        name="matricula"
        lenght="4/12"
        :value="$vinculo->matricula ?? old('matricula')"
    />
    
</div>

<div class="flex flex-wrap -mx-3 mb-2  mt-2 p-2">
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" value="true" name="avaliador" class="sr-only peer" {{isset($vinculo->avaliador) && $vinculo->avaliador ? 'checked' : null}}>
        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Avaliador</span>
    </label>
</div>
<x-layouts.buttons.submit-button text="Salvar"/>
