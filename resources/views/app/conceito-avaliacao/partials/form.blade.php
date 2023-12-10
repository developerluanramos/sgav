@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Conceito"
        name="descricao"
        lenght="10/12"
        :value="$conceitoAvaliacao->descricao ?? old('descricao')"
    />
</div>

<x-layouts.inputs.input-item/>
<x-layouts.buttons.submit-button text="Salvar"/>
