<?php

namespace App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao;

use App\Actions\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoCreateRequest;

class ModeloAvaliacaoCreateController extends Controller
{
    public function create(string $cicloAvaliativoUuid, ModeloAvaliacaoCreateRequest $request, ModeloAvaliacaoCreateAction $modeloAvaliacaoCreateAction)
    {
        $formData = $modeloAvaliacaoCreateAction->exec($cicloAvaliativoUuid);
        $formData["ciclosAvaliativosUuid"] = $cicloAvaliativoUuid;
        
        return view('app.ciclo-avaliativo.modelo.create', [
            'formData' => $formData
        ]);
    }
}
