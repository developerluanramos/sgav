<?php

namespace App\Http\Controllers\App\CicloAvaliativoModeloAvaliacao;

use App\Actions\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreAction;
use App\DTO\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreRequest;

class ModeloAvaliacaoStoreController extends Controller
{
    public function store(string $cicloAvaliativoUuid, ModeloAvaliacaoStoreRequest $storeRequest, ModeloAvaliacaoStoreAction $ModeloAvaliacaoStoreAction)
    {
        $modeloDto = ModeloAvaliacaoStoreDTO::makeFromRequest($storeRequest);

        $ModeloAvaliacaoStoreAction->exec($cicloAvaliativoUuid, $modeloDto);

        return redirect()->route('ciclo-avaliativo.index');
    }
}
