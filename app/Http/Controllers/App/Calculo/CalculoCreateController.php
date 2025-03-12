<?php

namespace App\Http\Controllers\App\Calculo;

use App\Actions\Calculo\CalculoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Calculo\CalculoCreateRequest;

class CalculoCreateController extends Controller
{
    public function __construct(
        protected CalculoCreateAction $createAction
    ) { }

    public function create(string $cicloAvaliativoUuid, CalculoCreateRequest $createRequest)
    {
        $formData = $this->createAction->exec($cicloAvaliativoUuid);
        $formData["ciclosAvaliativosUuid"] = $cicloAvaliativoUuid;
        
        return view('app.ciclo-avaliativo.calculo.create', compact('formData'));
    }
}