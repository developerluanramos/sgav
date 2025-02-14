<?php

namespace App\Http\Controllers\App\CicloAvaliativoIncidencia;

use App\Actions\CicloAvaliativoIncidencia\IncidenciaCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoIncidencia\IncidenciaCreateRequest;

class IncidenciaCreateController extends Controller
{
    public function create(string $cicloAvaliativoUuid, IncidenciaCreateRequest $request, IncidenciaCreateAction $incidenciaCreateAction)
    {
        $formData = $incidenciaCreateAction->exec($cicloAvaliativoUuid);
        $formData["ciclosAvaliativosUuid"] = $cicloAvaliativoUuid;
        
        return view('app.ciclo-avaliativo.incidencia.create', [
            'formData' => $formData
        ]);
    }
}
