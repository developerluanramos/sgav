<?php

namespace App\Http\Controllers\App\ModeloAvaliacao;

use App\Actions\ModeloAvaliacao\ModeloAvaliacaoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoCreateRequest;

class ModeloAvaliacaoCreateController extends Controller
{
    public function __construct(
        protected ModeloAvaliacaoCreateAction $createAction
    ) { }

    public function create(ModeloAvaliacaoCreateRequest $createRequest)
    {
        $formData = $this->createAction->exec();

        return view('app.modelo-avaliacao.create', compact('formData'));
    }
}
