<?php

namespace App\Http\Controllers\App\Vinculo;

use App\Actions\Vinculo\VinculoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Vinculo\VinculoCreateRequest;

class VinculoCreateController extends Controller
{
    public function __construct(
        protected VinculoCreateAction $createAction
    ) { }

    public function create(VinculoCreateRequest $departamentoCreateRequest)
    {
        $formData = $this->createAction->exec();
        return view('app.vinculo.create', compact('formData'));
    }
}
