<?php

namespace App\Http\Controllers\App\CicloAvaliativo;

use App\Actions\CicloAvaliativo\CicloAvaliativoStoreAction;
use App\DTO\CicloAvaliativo\CicloAvaliativoStoreDTO;
use App\Enums\UnidadePeriodicidadeEnum;
use App\Http\Requests\App\CicloAvaliativo\CicloAvaliativoStoreRequest;
use Symfony\Component\HttpFoundation\Request;

class CicloAvaliativoStoreController
{
    public function store(CicloAvaliativoStoreRequest $storeRequest, CicloAvaliativoStoreAction $storeAction)
    {
        $storeAction->exec(CicloAvaliativoStoreDTO::makeFromRequest($storeRequest));

        return redirect()->to(route('ciclo-avaliativo.index'));
    }
}
