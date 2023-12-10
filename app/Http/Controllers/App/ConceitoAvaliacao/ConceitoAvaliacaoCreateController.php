<?php

namespace App\Http\Controllers\App\ConceitoAvaliacao;

use App\Actions\ConceitoAvaliacao\ConceitoAvaliacaoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoCreateRequest;

class ConceitoAvaliacaoCreateController extends Controller
{
    public function __construct(
        protected ConceitoAvaliacaoCreateAction $createAction
    ) { }

    public function create(ConceitoAvaliacaoCreateRequest $createRequest)
    {
        $formData = $this->createAction->exec();

        return view('app.conceito-avaliacao.create', compact('formData'));
    }
}
