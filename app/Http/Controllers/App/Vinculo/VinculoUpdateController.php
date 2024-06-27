<?php

namespace App\Http\Controllers\App\Vinculo;

use App\Actions\Vinculo\VinculoUpdateAction;
use App\DTO\Vinculo\VinculoUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Vinculo\VinculoUpdateRequest;

class VinculoUpdateController extends Controller
{
    public function __construct(
        protected VinculoUpdateAction $updateAction
    ) { }

    public function update(string $uuid, VinculoUpdateRequest $updateRequest)
    {
        $updateRequest = $updateRequest->merge([
            'uuid' => $uuid,
        ]);
        $this->updateAction->exec(VinculoUpdateDTO::makeFromRequest($updateRequest));

        return redirect()->route('vinculo.index')->with('message', 'Registro atualizado com sucesso');
    }
}
