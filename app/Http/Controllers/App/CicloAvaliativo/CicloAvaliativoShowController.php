<?php

namespace App\Http\Controllers\App\CicloAvaliativo;

use App\Actions\CicloAvaliativo\CicloAvaliativoShowAction;
use App\DTO\CicloAvaliativo\CicloAvaliativoShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativo\CicloAvaliativoShowRequest;

class CicloAvaliativoShowController extends Controller
{
    public function __construct(
        protected CicloAvaliativoShowAction $showAction
    ) {}

    public function show(string $uuid, CicloAvaliativoShowRequest $storeRequest)
    {
        $storeRequest->merge([
            "uuid" => $uuid
        ]);

        $showActionData = $this->showAction->exec(CicloAvaliativoShowDTO::makeFromRequest($storeRequest));
        
        return view('app.ciclo-avaliativo.show', [
            "cicloAvaliativo" => $showActionData['cicloAvaliativo'],
            "avaliados" => $showActionData['avaliados']
        ]);
    }
}
