@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Modelo"
        name="nome"
        lenght="8/12"
        :value="$modeloAvaliacao->nome ?? old('nome')"
    />    
</div>
    <x-layouts.inputs.input-switch
    label="Situação"
    name="situacao"
    :value="$modeloAvaliacao->situacao ?? old('situacao')"
/>
<div class="-mx-3 mt-2">
    <x-layouts.inputs.input-normal-select-enum
        label="Finalidade"
        name="finalidade"
        origin="finalidade"
        lenght="4/12"
        :data="$formData['finalidade']"
        :value="$modeloAvaliacao->finalidade ?? old('finalidade')"
    />
</div>

<x-layouts.buttons.submit-button text="Salvar"/>
