<?php

namespace App\Http\Controllers\App\ConceitoAvaliacao;

use App\Actions\ConceitoAvaliacao\ConceitoAvaliacaoStoreAction;
use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoStoreRequest;

class ConceitoAvaliacaoStoreController extends Controller
{
    public function __construct(
        protected ConceitoAvaliacaoStoreAction $storeAction
    ) { }

    public function store(ConceitoAvaliacaoStoreRequest $storeRequest)
    {
        $this->storeAction->exec(ConceitoAvaliacaoStoreDTO::makeFromRequest($storeRequest));

        return redirect()->route('conceito-avaliacao.index')->with('message', 'Registro criado');
    }
}
