<?php

namespace App\Http\Controllers\App\Avaliador;

use App\Actions\Avaliador\AvaliadorCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Avaliador\AvaliadorCreateRequest;

class AvaliadorCreateController extends Controller
{
    public function __construct(
        protected AvaliadorCreateAction $createAction
    ) { }

    public function create(AvaliadorCreateRequest $avaliadorCreateRequest)
    {
        $formData = $this->createAction->exec();
        return view('app.avaliador.create', compact('formData'));
    }

}