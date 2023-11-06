<?php

namespace App\Http\Controllers\App\Servidor;

use App\Actions\Servidor\ServidorCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Servidor\ServidorCreateRequest;
use App\Models\Cargo;

class ServidorCreateController extends Controller
{
    public function __construct(
        protected ServidorCreateAction $createAction
    ) { }

    public function create(ServidorCreateRequest $servidorCreateRequest)
    {
        $formData = $this->createAction->exec();
        
        return view('app.servidor.create', compact('formData'));
    }

}
