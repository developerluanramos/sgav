<?php

namespace App\Http\Controllers\App\ConceitoAvaliacao;

use App\Actions\ConceitoAvaliacao\ConceitoAvaliacaoCreateAction;
use App\Actions\ConceitoAvaliacao\ConceitoAvaliacaoEditAction;
use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoEditRequest;

class ConceitoAvaliacaoEditController extends Controller
{
    public function __construct(
        protected ConceitoAvaliacaoEditAction $editAction,
        protected ConceitoAvaliacaoCreateAction $createAction
    ) { }

    public function edit
    (string $uuid, 
    ConceitoAvaliacaoEditRequest $editRequest)
    {
        $editRequest->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();
        
        $conceitoAvaliacao = $this->editAction->exec(ConceitoAvaliacaoEditDTO::makeFromRequest($editRequest));

        return view('app.conceito-avaliacao.edit', [
            "conceitoAvaliacao" => $conceitoAvaliacao,
            "formData" => $formData
        ]);
    }
}
