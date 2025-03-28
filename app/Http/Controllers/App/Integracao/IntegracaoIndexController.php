<?php

namespace App\Http\Controllers\App\Integracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Integracao\IntegracaoIndexRequest;
use App\Models\Integracao;

class IntegracaoIndexController extends Controller
{
    public function __construct(
        
    ) { }

    public function index(IntegracaoIndexRequest $integracaoIndexRequest)
    {
        $integracoes = Integracao::all();
        
        return view('app.integracao.index', ['integracoes' => $integracoes]);
    }
}