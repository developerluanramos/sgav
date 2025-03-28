@csrf

<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Integracao"
        name="nome"
        lenght="8/12"
        :value="$cargo->nome ?? old('nome')"
    />
</div>
    
<x-layouts.buttons.submit-button text="Salvar"/>