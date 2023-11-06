<?php

namespace App\Http\Controllers\App\Servidor;

use App\Actions\Servidor\ServidorUpdateAction;
use App\DTO\Servidor\ServidorUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Servidor\ServidorUpdateRequest;

class ServidorUpdateController extends Controller
{
    public function __construct(
        protected ServidorUpdateAction $updateAction
    ) { }

    public function update(string $uuid, ServidorUpdateRequest $updateRequest)
    {
        $updateRequest = $updateRequest->merge([
            'uuid' => $uuid,
        ]);
        $this->updateAction->exec(ServidorUpdateDTO::makeFromRequest($updateRequest));

        return redirect()->route('servidor.index')->with('message', 'Registro atualizado com sucesso');
    }
}
