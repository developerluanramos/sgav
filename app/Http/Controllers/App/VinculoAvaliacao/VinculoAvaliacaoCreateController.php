<?php

namespace App\Http\Controllers\App\VinculoAvaliacao;

use App\Actions\VinculoAvaliacao\VinculoAvaliacaoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\VinculoAvaliacao\VinculoAvaliacaoCreateRequest;

class VinculoAvaliacaoCreateController extends Controller
{
    public function __construct(
        protected VinculoAvaliacaoCreateAction $createAction
    ) { }

    public function create(string $cicloAvaliativoUuid, string $vinculoUuid, VinculoAvaliacaoCreateRequest $createRequest)
    {
        $formData = $this->createAction->exec($cicloAvaliativoUuid, $vinculoUuid);

        return view('app.vinculo-avaliacao.create', compact('formData'));
    }
}
