<?php

namespace App\Http\Controllers\App\Vinculo;

use App\Actions\Vinculo\VinculoCreateAction;
use App\Actions\Vinculo\VinculoEditAction;
use App\DTO\Vinculo\VinculoEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Vinculo\VinculoEditRequest;

class VinculoEditController extends Controller
{
    public function __construct(
        protected VinculoEditAction $editAction,
        protected VinculoCreateAction $createAction
    ) { }

    public function edit(string $uuid, VinculoEditRequest $editRequest)
    {
        $editRequest->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();

        $vinculo = $this->editAction->exec(VinculoEditDTO::makeFromRequest($editRequest));

        return view('app.vinculo.edit', [
            "vinculo" => $vinculo,
            "formData" => $formData
        ]);
    }
}
