<?php

namespace App\Http\Controllers\App\Calculo;

use App\Actions\Calculo\CalculoStoreAction;
use App\DTO\Calculo\CalculoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Calculo\CalculoStoreRequest;

class CalculoStoreController extends Controller
{
    public function __construct(
        protected CalculoStoreAction $storeAction
    ) { }

    public function store(string $cicloAvaliativoUuid, CalculoStoreRequest $request)
    {
        $request->merge(['ciclos_avaliativos_uuid' => $cicloAvaliativoUuid]);

        $this->storeAction->exec(CalculoStoreDTO::makeFromRequest($request));

        return redirect()->to(route('ciclo-avaliativo.index'));
    }
}