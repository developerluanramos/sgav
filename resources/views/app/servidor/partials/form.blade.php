@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Nome"
        name="nome"
        lenght="8/12"
        :value="$servidor->nome ?? old('nome')"
    />

    <x-layouts.inputs.input-date
        label="Data de Nascimento"
        name="data_nascimento"
        lenght="4/12"
        :value="$servidor->data_nascimento ?? old('data_nascimento')"
    />
</div>

<x-layouts.buttons.submit-button text="Salvar"/>
