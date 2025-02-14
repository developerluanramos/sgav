<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Nome"
        name="nome"
        lenght="4/12"
        :value="$vinculo->nome ?? old('nome')"
    />
    <x-layouts.inputs.input-normal-text
        label="Email"
        name="email"
        lenght="4/12"
        :value="$vinculo->email ?? old('email')"
    />
    <x-layouts.inputs.input-normal-text
        label="Matrícula"
        name="matricula"
        lenght="2/12"
        :value="$vinculo->matricula ?? old('matricula')"
    />
    <x-layouts.inputs.input-date
        label="Data de Admissão"
        name="data_admissao"
        lenght="2/12"
        :value="$vinculo->data_admissao ?? old('data_admissao')"
    />
</div>

<div class="flex flex-wrap -mx-3 mb-2">

    
</div>

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Código Órgão"
        :disabled="true"
        name="codigo_orgao"
        lenght="2/12"
        :value="$vinculo->codigo_orgao ?? old('codigo_orgao')"
    />
    <x-layouts.inputs.input-normal-text
        label="Nome Órgão"
        name="nome_orgao"
        lenght="10/12"
        :disabled="true"
        :value="$vinculo->nome_orgao ?? old('nome_orgao')"
    />
</div>

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Código Função"
        name="codigo_funcao"
        lenght="2/12"
        :disabled="true"
        :value="$vinculo->codigo_funcao ?? old('codigo_funcao')"
    />
    <x-layouts.inputs.input-normal-text
        label="Nome Função"
        name="nome_funcao"
        lenght="10/12"
        :disabled="true"
        :value="$vinculo->nome_funcao ?? old('nome_funcao')"
    />
</div>

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Código L. Trabalho"
        name="codigo_local_trabalho"
        lenght="2/12"
        :disabled="true"
        :value="$vinculo->codigo_local_trabalho ?? old('codigo_local_trabalho')"
    />
    <x-layouts.inputs.input-normal-text
        label="Nome L. Trabalho"
        name="nome_local_trabalho"
        lenght="10/12"
        :disabled="true"
        :value="$vinculo->nome_local_trabalho ?? old('nome_local_trabalho')"
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
