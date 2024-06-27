<?php

namespace App\Http\Controllers\App\Vinculo;

use App\Actions\Vinculo\VinculoStoreAction;
use App\DTO\Vinculo\VinculoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Vinculo\VinculoStoreRequest;

class VinculoStoreController extends Controller
{
    public function __construct(
        protected VinculoStoreAction $storeAction
    ) {}

    public function store(VinculoStoreRequest $storeRequest)
    {
        $this->storeAction->exec(VinculoStoreDTO::makeFromRequest($storeRequest));

        return redirect()->route('vinculo.index')->with('message', 'Vinculo Criado Com Sucesso!');
    }
}
