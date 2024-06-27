<?php

namespace App\Http\Controllers\App\CicloAvaliativoIncidencia;

use App\Actions\CicloAvaliativoIncidencia\IncidenciaStoreAction;
use App\DTO\CicloAvaliativoIncidencia\IncidenciaStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoIncidencia\IncidenciaStoreRequest;

class IncidenciaStoreController extends Controller
{
    public function store(IncidenciaStoreRequest $storeRequest, IncidenciaStoreAction $incidenciaStoreAction)
    {
        $incidencia = $incidenciaStoreAction->exec(IncidenciaStoreDTO::makeFromRequest($storeRequest));

        return redirect()->route('ciclo-avaliativo.template.create', ['ciclosAvaliativosUuid' => $incidencia->ciclos_avaliativos_uuid]);
    }
}
