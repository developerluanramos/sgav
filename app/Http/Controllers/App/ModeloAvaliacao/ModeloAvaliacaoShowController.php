<?php

namespace App\Http\Controllers\App\ModeloAvaliacao;

use App\Actions\ModeloAvaliacao\ModeloAvaliacaoShowAction;
use App\DTO\ModeloAvaliacao\ModeloAvaliacaoShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoShowRequest;

class ModeloAvaliacaoShowController extends Controller
{
    public function __construct(
        protected ModeloAvaliacaoShowAction $storeAction
    ) {}

    public function show(string $uuid, ModeloAvaliacaoShowRequest $storeRequest)
    {
        $storeRequest->merge([
            "uuid" => $uuid
        ]);

        $modeloAvaliacao = $this->storeAction->exec(ModeloAvaliacaoShowDTO::makeFromRequest($storeRequest));
        
        return view('app.modelo-avaliacao.show', [
            "modeloAvaliacao" => $modeloAvaliacao
        ]);
    }
}
