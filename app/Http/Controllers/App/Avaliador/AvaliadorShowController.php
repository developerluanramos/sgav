<?php

namespace App\Http\Controllers\App\Avaliador;

use App\Actions\Avaliador\AvaliadorShowAction;
use App\DTO\Avaliador\AvaliadorShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Avaliador\AvaliadorShowRequest;

class AvaliadorShowController extends Controller
{
    public function __construct(
        protected AvaliadorShowAction $showAction
    ) {}

    public function show(string $uuid, AvaliadorShowRequest $showRequest)
    {
        $showRequest->merge([
            "uuid" => $uuid
        ]);

        $avaliador = $this->showAction->exec(AvaliadorShowDTO::makeFromRequest($showRequest));

        return view('app.avaliador.show', [
            "avaliador" => $avaliador
        ]);
    }
}
