<?php

namespace App\Http\Controllers\App\Avaliador;

use App\Actions\Avaliador\AvaliadorIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Avaliador\AvaliadorIndexRequest;

class AvaliadorIndexController extends Controller
{
    public function __construct(
        protected AvaliadorIndexAction $indexAction
    ) {}

    public function index(AvaliadorIndexRequest $avaliadorIndexRequest)
    {
        $avaliadores = $this->indexAction->exec(
            page: $avaliadorIndexRequest->get('page', 1),
            totalPerPage: $avaliadorIndexRequest->get('totalPerPage', 15),
            filter: $avaliadorIndexRequest->get('filter', null),
        );

        $filters = ['filter' => $avaliadorIndexRequest->get('filter', null)];

        return view('app.avaliador.index', compact('avaliadores', 'filters'));
    }
}
