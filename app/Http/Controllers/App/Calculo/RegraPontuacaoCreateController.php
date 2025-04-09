<?php

namespace App\Http\Controllers\App\Calculo;

use App\Actions\Calculo\RegraPontuacaoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\RegraPontuacao\RegraPontuacaoCreateRequest;

class RegraPontuacaoCreateController extends Controller
{
    public function __construct(
        protected RegraPontuacaoCreateAction $createAction
    ) { }

    public function create(string $cicloAvaliativoUuid, RegraPontuacaoCreateRequest $createRequest)
    {
        $formData = $this->createAction->exec($cicloAvaliativoUuid);
        $formData["ciclosAvaliativosUuid"] = $cicloAvaliativoUuid;

        return view('app.ciclo-avaliativo.calculo.create', compact('formData'));
    }
}
