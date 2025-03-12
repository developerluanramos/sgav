<?php

namespace App\Http\Controllers\App\Calculo;

use App\Actions\Calculo\CalculoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Calculo\CalculoCreateRequest;
use App\Http\Requests\App\Calculo\CalculoStoreRequest;

class CalculoStoreController extends Controller
{
    public function __construct(
        // protected CalculoCreateAction $createAction
    ) { }

    public function store(string $cicloAvaliativoUuid, CalculoStoreRequest $request)
    {
        dd($request->all());
        // $formData = $this->createAction->exec($cicloAvaliativoUuid);

        // return view('app.ciclo-avaliativo.calculo.create', compact('formData'));
    }
}