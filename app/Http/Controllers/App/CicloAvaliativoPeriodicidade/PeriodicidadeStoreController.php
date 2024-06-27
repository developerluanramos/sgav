<?php

namespace App\Http\Controllers\App\CicloAvaliativoPeriodicidade;

use App\Actions\CicloAvaliativoPeriodicidade\PeriodicidadeStoreAction;
use App\DTO\CicloAvaliativoPeriodicidade\PeriodicidadeStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoPeriodicidade\PeriodicidadeStoreRequest;

class PeriodicidadeStoreController extends Controller
{
    public function store(PeriodicidadeStoreRequest $storeRequest, PeriodicidadeStoreAction $periodicidadeStoreAction)
    {
        $periodicidade = $periodicidadeStoreAction->exec(PeriodicidadeStoreDTO::makeFromRequest($storeRequest));

        return redirect()->route('ciclo-avaliativo.incidencia.create', ['ciclosAvaliativosUuid' => $periodicidade->ciclos_avaliativos_uuid]);
    }
}
