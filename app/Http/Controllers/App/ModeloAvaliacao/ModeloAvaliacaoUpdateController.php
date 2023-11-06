<?php

namespace App\Http\Controllers\App\ModeloAvaliacao;

use App\Actions\ModeloAvaliacao\ModeloAvaliacaoUpdateAction;
use App\DTO\ModeloAvaliacao\ModeloAvaliacaoUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoUpdateRequest;

class ModeloAvaliacaoUpdateController extends Controller
{
    public function __construct(
        protected ModeloAvaliacaoUpdateAction $updateAction
    ) {}

    public function update(ModeloAvaliacaoUpdateRequest $updateRequest)
    {
        $this->updateAction->exec(ModeloAvaliacaoUpdateDTO::makeFromRequest($updateRequest));

        return redirect()->route('modelo-avaliacao.index')->with('message', 'Registro atualizado');
    }
}
