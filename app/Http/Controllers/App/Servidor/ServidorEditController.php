<?php

namespace App\Http\Controllers\App\Servidor;

use App\Actions\Servidor\ServidorCreateAction;
use App\Actions\Servidor\ServidorEditAction;
use App\DTO\Servidor\ServidorEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Servidor\ServidorEditRequest;

class ServidorEditController extends Controller
{
    public function __construct(
        protected ServidorEditAction $editAction,
        protected ServidorCreateAction $createAction
    ) { }

    public function edit(string $uuid, ServidorEditRequest $editRequest)
    {
        $editRequest->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();

        $servidor = $this->editAction->exec(ServidorEditDTO::makeFromRequest($editRequest));

        return view('app.servidor.edit', [
            "servidor" => $servidor,
            "formData" => $formData
        ]);
    }
}
