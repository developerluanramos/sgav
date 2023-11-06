<?php

namespace App\Http\Controllers\App\Servidor;

use App\Actions\Servidor\ServidorStoreAction;
use App\DTO\Servidor\ServidorStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Servidor\ServidorStoreRequest;

class ServidorStoreController extends Controller
{
    public function __construct(
        protected ServidorStoreAction $storeAction
    ) { }

    public function store(ServidorStoreRequest $storeRequest)
    {
        $this->storeAction->exec(ServidorStoreDTO::makeFromRequest($storeRequest));

        return redirect()->route('servidor.index')->with('message', 'Registro criado');
    }
}
