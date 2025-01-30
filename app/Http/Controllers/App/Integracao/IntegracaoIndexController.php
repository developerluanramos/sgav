<?php

namespace App\Http\Controllers\App\Integracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Integracao\IntegracaoIndexRequest;

class IntegracaoIndexController extends Controller
{
    public function __construct(
        // protected IndicadorDesempenhoStoreAction $action
    ) { }

    public function index(IntegracaoIndexRequest $integracaoIndexRequest)
    {
        return view('app.integracao.index');
    }
}