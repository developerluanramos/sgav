<?php

namespace App\Http\Controllers\App\CicloAvaliativoIncidencia;

use App\Actions\CicloAvaliativoIncidencia\IncidenciaStoreAction;
use App\DTO\CicloAvaliativoIncidencia\IncidenciaStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoIncidencia\IncidenciaStoreRequest;

class IncidenciaStoreController extends Controller
{
    public function store(string $cicloAvaliativoUuid, IncidenciaStoreRequest $storeRequest, IncidenciaStoreAction $incidenciaStoreAction)
    {
        $storeRequest->merge(['ciclos_avaliativos_uuid' => $cicloAvaliativoUuid]);
        
        $incidenciaStoreAction->exec(IncidenciaStoreDTO::makeFromRequest($storeRequest));

        return redirect()->to(route('ciclo-avaliativo.index'));
    }
}
