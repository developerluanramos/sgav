<?php

namespace App\Http\Controllers\App\Servidor;

use App\Actions\Servidor\ServidorIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Servidor\ServidorIndexRequest;

class ServidorIndexController extends Controller
{
    public function __construct(
        protected ServidorIndexAction $indexAction
    ) {}

    public function index(ServidorIndexRequest $servidorIndexRequest)
    {
        $servidores = $this->indexAction->exec(
            page: $servidorIndexRequest->get('page', 1),
            totalPerPage: $servidorIndexRequest->get('totalPerPage', 15),
            filter: $servidorIndexRequest->get('filter', null),
        );

        $filters = ['filter' => $servidorIndexRequest->get('filter', null)];

        return view('app.servidor.index', compact('servidores', 'filters'));
    }
}
