<?php

namespace App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao;

use App\Actions\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreAction;
use App\DTO\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreRequest;

class ModeloAvaliacaoStoreController extends Controller
{
    public function store(ModeloAvaliacaoStoreRequest $storeRequest, ModeloAvaliacaoStoreAction $ModeloAvaliacaoStoreAction)
    {
        $modeloDto = ModeloAvaliacaoStoreDTO::makeFromRequest($storeRequest);

        $ModeloAvaliacaoStoreAction->exec($modeloDto);

        return redirect()->route('ciclo-avaliativo.conclusao.create', ['ciclosAvaliativosUuid' => $modeloDto->ciclosAvaliativosUuid]);
    }
}
