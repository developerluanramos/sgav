<?php

namespace App\Http\Controllers\App\CicloAvaliativo;

use App\Actions\CicloAvaliativo\CicloAvaliativoIndexAction;
use App\Http\Requests\App\CicloAvaliativo\CicloAvaliativoIndexRequest;

class CicloAvaliativoIndexController
{
    public function __construct(
        protected CicloAvaliativoIndexAction $indexAction
    ) { }

    public function index(CicloAvaliativoIndexRequest $request)
    {
        $ciclosAvaliativos = $this->indexAction->exec(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 15),
            filter: $request->get('filter', null),
        );

        return view('app.ciclo-avaliativo.index', compact('ciclosAvaliativos'));
    }
}
