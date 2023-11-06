<?php

namespace App\Http\Controllers\App\ModeloAvaliacao;

use App\Actions\ModeloAvaliacao\ModeloAvaliacaoStoreAction;
use App\DTO\ModeloAvaliacao\ModeloAvaliacaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoStoreRequest;

class ModeloAvaliacaoStoreController extends Controller
{
    public function __construct(
        protected ModeloAvaliacaoStoreAction $storeAction
    ) { }

    public function store(ModeloAvaliacaoStoreRequest $storeRequest)
    {
        $this->storeAction->exec(ModeloAvaliacaoStoreDTO::makeFromRequest($storeRequest));

        return redirect()->route('modelo-avaliacao.index')->with('message', 'Registro criado');
    }
}
