<div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <x-layouts.inputs.input-date
            label="Data de início do ciclo"
            name="iniciado_em"
            lenght="3/12"
            :value="$peridodicidade->iniciado_em ?? old('iniciado_em')"
        />
    </div>
    <div class="flex flex-wrap -mx-3 mb-2 mt-6">
        <x-layouts.inputs.input-normal-number
            label="Quantidade de ciclos"
            name="quantidade_ciclos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_ciclos ?? old('quantidade_ciclos')"
        />
        <x-layouts.inputs.input-normal-number
            label="Quantidade unidades"
            name="quantidade_unidade_ciclos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_unidade_ciclos ?? old('quantidade_unidade_ciclos')"
        />
        <x-layouts.inputs.input-normal-select-enum
            label="Unidade do ciclo"
            name="unidade_ciclos"
            lenght="2/12"
            :data="$formData['unidadesPeriodicidade']"
            :value="$peridodicidade->iniciado_em ?? old('iniciado_em')"
        />
        <x-layouts.inputs.input-normal-number
            label="Quantidade de períodos"
            name="quantidade_periodos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_periodos ?? old('quantidade_periodos')"
        />
        <x-layouts.inputs.input-normal-number
            label="Quantidade unidades"
            name="quantidade_unidade_periodos"
            lenght="2/12"
            :value="$peridodicidade->quantidade_unidade_periodos ?? old('quantidade_unidade_periodos')"
        />
        <x-layouts.inputs.input-normal-select-enum
            label="Unidade do período"
            name="unidade_periodos"
            lenght="2/12"
            :data="$formData['unidadesPeriodicidade']"
            :value="$peridodicidade->unidade_periodos ?? old('unidade_periodos')"
        />
    </div>
    <div class="flex flex-wrap -mx-3 mb-2 mt-2 mt-6">
        <x-layouts.inputs.input-normal-number
            label="Abertura do ciclo"
            name="tolerancia_abertura_ciclo"
            lenght="3/12"
            :value="$peridodicidade->tolerancia_abertura_ciclo ?? old('tolerancia_abertura_ciclo')"
        />
        <x-layouts.inputs.input-normal-number
            label="Encerramento do ciclo"
            name="tolerancia_encerramento_ciclo"
            lenght="3/12"
            :value="$peridodicidade->tolerancia_encerramento_ciclo ?? old('tolerancia_encerramento_ciclo')"
        />
        <x-layouts.inputs.input-normal-number
            label="Abertura do periodo"
            name="tolerancia_abertura_periodo"
            lenght="3/12"
            :value="$peridodicidade->tolerancia_abertura_periodo ?? old('tolerancia_abertura_periodo')"
        />
        <x-layouts.inputs.input-normal-number
            label="Encerramento do periodo"
            name="tolerancia_encerramento_periodo"
            lenght="3/12"
            :value="$peridodicidade->tolerancia_encerramento_periodo ?? old('tolerancia_encerramento_periodo')"
        />
    </div>
</div>
