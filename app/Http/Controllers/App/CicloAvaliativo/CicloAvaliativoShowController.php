<?php

namespace App\Http\Controllers\App\CicloAvaliativo;

use App\Actions\CicloAvaliativo\CicloAvaliativoShowAction;
use App\DTO\CicloAvaliativo\CicloAvaliativoShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativo\CicloAvaliativoShowRequest;
use App\Repositories\Presenters\PaginationPresenter;

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
        
        $avaliadosPaginated = new PaginationPresenter($showActionData['avaliados']->paginate());

        // dd($avaliadosPaginated);
        return view('app.ciclo-avaliativo.show', [
            "cicloAvaliativo" => $showActionData['cicloAvaliativo'],
            "avaliados" => $avaliadosPaginated
        ]);
    }
}
