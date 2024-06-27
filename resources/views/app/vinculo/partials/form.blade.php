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

<x-layouts.buttons.submit-button text="Salvar"/>
