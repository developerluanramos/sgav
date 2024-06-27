<?php

namespace App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao;

use App\Actions\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoCreateRequest;

class ModeloAvaliacaoCreateController extends Controller
{
    public function create(ModeloAvaliacaoCreateRequest $request, ModeloAvaliacaoCreateAction $ModeloAvaliacaoCreateAction)
    {
        $formData = $ModeloAvaliacaoCreateAction->exec();
        $formData["ciclosAvaliativosUuid"] = $request->get('ciclosAvaliativosUuid');

        return view('app.ciclo-avaliativo.template.create', [
            'formData' => $formData
        ]);
    }
}
