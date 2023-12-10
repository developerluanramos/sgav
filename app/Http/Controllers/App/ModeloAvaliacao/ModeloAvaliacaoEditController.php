<?php

namespace App\Http\Controllers\App\ModeloAvaliacao;

use App\Actions\ModeloAvaliacao\ModeloAvaliacaoCreateAction;
use App\Actions\ModeloAvaliacao\ModeloAvaliacaoEditAction;
use App\DTO\ModeloAvaliacao\ModeloAvaliacaoEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoEditRequest;

class ModeloAvaliacaoEditController extends Controller
{
    public function __construct(
        protected ModeloAvaliacaoEditAction $editAction,
        protected ModeloAvaliacaoCreateAction $createAction
    ) { }

    public function edit(string $uuid, ModeloAvaliacaoEditRequest $editRequest)
    {
        $editRequest->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();

        $modeloAvaliacao = $this->editAction->exec(ModeloAvaliacaoEditDTO::makeFromRequest($editRequest));

        return view('app.modelo-avaliacao.edit', [
            "modeloAvaliacao" => $modeloAvaliacao,
            "formData" => $formData
        ]);
    }
}
