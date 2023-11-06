<?php

namespace App\Http\Controllers\App\Servidor;

use App\Actions\Servidor\ServidorShowAction;
use App\DTO\Servidor\ServidorShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Servidor\ServidorShowRequest;

class ServidorShowController extends Controller
{
    public function __construct(
        protected ServidorShowAction $storeAction
    ) {}

    public function show(string $uuid, ServidorShowRequest $storeRequest)
    {
        $storeRequest->merge([
            "uuid" => $uuid
        ]);

        $servidor = $this->storeAction->exec(ServidorShowDTO::makeFromRequest($storeRequest));
        
        return view('app.servidor.show', [
            "servidor" => $servidor
        ]);
    }
}
