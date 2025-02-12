<?php

namespace App\Http\Controllers\App\CicloAvaliativo;

use App\Enums\UnidadePeriodicidadeEnum;
use Symfony\Component\HttpFoundation\Request;

class CicloAvaliativoCreateController
{
    public function create(Request $request)
    {
        return view('app.ciclo-avaliativo.create', [
            "formData" => [
                "unidadesPeriodicidade" => UnidadePeriodicidadeEnum::asArray()
            ]
        ]);
    }
}
