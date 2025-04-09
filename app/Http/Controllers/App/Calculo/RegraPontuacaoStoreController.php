<?php

namespace App\Http\Controllers\App\Calculo;

use App\Actions\Calculo\RegraPontuacaoStoreAction;
use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\RegraPontuacao\RegraPontuacaoStoreRequest;

class RegraPontuacaoStoreController extends Controller
{
    public function __construct(
        protected RegraPontuacaoStoreAction $storeAction
    ) { }

    public function store(string $cicloAvaliativoUuid, RegraPontuacaoStoreRequest $request)
    {
        $request->merge(['ciclos_avaliativos_uuid' => $cicloAvaliativoUuid]);
        dd($request->all());
        $this->storeAction->exec(RegraPontuacaoStoreDTO::makeFromRequest($request));

        return redirect()->to(route('ciclo-avaliativo.index'));
    }
}
