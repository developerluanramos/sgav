@php
    $finalidades = ["Estágio probatório", "Evolução Funcional"]
@endphp
<div class="mt-8">
    <b class="uppercase">Ciclos avaliativos</b>
</div>
<div>
<x-layouts.tables.simple-table
    :headers="[
        'Código Controle',
        'Finalidade',
        'Iniciado em',
        'Progresso',
        'Fase',
        'Status',
        'Ações'
    ]"
    :appends="[]"
>
    @section('table-content')
        @foreach($ciclos_avaliativos as $index => $ciclo)
            <tr>
                <td>{{$ciclo->uuid}}</td>
                <td> <b> {{$finalidades[$index]}} </b></td>
                <td>{{$ciclo->periodicidade['iniciado_em']}}</td>
                <td class="p-3">
                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                        @php
                            $percent = random_int(80, 87);
                        @endphp
                        <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{$percent}}%">
                            {{$percent}}%
                        </div>
                    </div>
                </td>
                <td>
                    <x-layouts.badges.step-ciclo-avaliativo :step="$ciclo->step" />
                </td>
                <td><x-layouts.badges.status-ciclo-avaliativo :status="$ciclo->status"/></td>
                <td class="text-right">
                    <x-layouts.buttons.action-button
                        text="Ver"
                        action="ver"
                        color="secondary"
                        :route="route('ciclo-avaliativo.show', ['uuid' => $ciclo->uuid])"
                    />
                    {{-- @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.periodicidade.create')"
                        />
                    @endif
                    @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.incidencia.create', ['ciclosAvaliativosUuid' => $ciclo->uuid])"
                        />
                    @endif
                    @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::TEMPLATE)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.template.create', ['ciclosAvaliativosUuid' => $ciclo->uuid])"
                        />
                    @endif
                    @if($ciclo->step == \App\Enums\CicloAvaliativoStepsEnum::CONCLUSAO)
                        <x-layouts.buttons.action-button
                            text="Editar"
                            action="editar"
                            color="primary"
                            :route="route('ciclo-avaliativo.conclusao.create', ['ciclosAvaliativosUuid' => $ciclo->uuid])"
                        />
                    @endif --}}
                </td>
            </tr>
        @endforeach
    @endsection
</x-layouts.tables.simple-table>

</div>
