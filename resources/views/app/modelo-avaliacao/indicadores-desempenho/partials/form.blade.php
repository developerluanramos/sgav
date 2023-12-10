<div class="flex flex-wrap -mx-3 mb-2">
    <x-layouts.inputs.input-normal-text
        label="Descricao"
        name="descricao"
        lenght="6/12"
        :value="$indicadorDesempenho->descricao ?? old('descricao')"
    />
    <x-layouts.inputs.input-normal-select-array
        label="Conceitos"
        name="conceito_avaliacao_uuid"
        origin="conceito_avaliacao_uuid"
        lenght="4/12"
        :data="$formData['conceitos']"
        :value="$indicadorDesempenho->conceito_avaliacao_uuid ?? old('conceito_avaliacao_uuid')"
    />
    <input type="hidden" name="modelo_avaliacao_uuid" id="modelo_avaliacao_uuid" value="{{ $modeloAvaliacao->uuid }}"/>
    <input type="hidden" name="fator_avaliacao_uuid" id="fator_avaliacao_uuid" value="{{ $fatorAvaliacao->uuid}}"/>
    <x-layouts.buttons.submit-with-icon-button class="w-full md:w-2/12" text="Salvar"/>
</div>

