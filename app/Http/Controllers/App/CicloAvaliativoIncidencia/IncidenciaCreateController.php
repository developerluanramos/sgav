<?php

namespace App\Http\Controllers\App\CicloAvaliativoIncidencia;

use App\Actions\CicloAvaliativoIncidencia\IncidenciaCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoIncidencia\IncidenciaCreateRequest;

class IncidenciaCreateController extends Controller
{
    public function create(IncidenciaCreateRequest $request, IncidenciaCreateAction $incidenciaCreateAction)
    {
        $formData = $incidenciaCreateAction->exec();
        $formData["ciclosAvaliativosUuid"] = $request->get('ciclosAvaliativosUuid');
        return view('app.ciclo-avaliativo.incidencia.create', [
            'formData' => $formData
        ]);
    }
}
