<?php

namespace App\Http\Controllers\App\CicloAvaliativo;

use Symfony\Component\HttpFoundation\Request;

class CicloAvaliativoCreateController
{
    public function create(Request $request)
    {
        $step = $request->get('step') ?? 'periodicidade'; // -- alterar para ENUM

        return view('app.ciclo-avaliativo.create', compact('step'));
    }
}
