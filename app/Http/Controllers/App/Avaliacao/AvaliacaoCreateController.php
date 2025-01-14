<?php

namespace App\Http\Controllers\App\Avaliacao;

use App\Actions\Avaliacao\AvaliacaoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Avaliacao\AvaliacaoCreateRequest;

class AvaliacaoCreateController extends Controller
{
    public function __construct(
        protected AvaliacaoCreateAction $createAction
    ) { }

    public function create(string $cicloAvaliativoUuid, string $vinculoUuid, AvaliacaoCreateRequest $createRequest)
    {
        $formData = $this->createAction->exec($cicloAvaliativoUuid, $vinculoUuid);

        return view('app.avaliacao.create', compact('formData'));
    }
}
