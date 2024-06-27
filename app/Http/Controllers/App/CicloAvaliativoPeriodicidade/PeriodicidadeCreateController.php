<?php

namespace App\Http\Controllers\App\CicloAvaliativoPeriodicidade;

use App\Actions\CicloAvaliativoPeriodicidade\PeriodicidadeCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CicloAvaliativoPeriodicidade\PeriodicidadeCreateRequest;

class PeriodicidadeCreateController extends Controller
{
    public function create(PeriodicidadeCreateRequest $request, PeriodicidadeCreateAction $periodicidadeCreateAction)
    {
        $formData = $periodicidadeCreateAction->exec();

        return view('app.ciclo-avaliativo.periodicidade.create', compact('formData'));
    }
}
