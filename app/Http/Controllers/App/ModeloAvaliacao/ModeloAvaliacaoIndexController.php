<?php

namespace App\Http\Controllers\App\ModeloAvaliacao;

use App\Actions\ModeloAvaliacao\ModeloAvaliacaoIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoIndexRequest;

class ModeloAvaliacaoIndexController extends Controller
{
    public function __construct(
        protected ModeloAvaliacaoIndexAction $indexAction
    ) {}

    public function index(ModeloAvaliacaoIndexRequest $modeloAvaliacaoIndexRequest)
    {
        $modeloAvaliacao = $this->indexAction->exec(
            page: $modeloAvaliacaoIndexRequest->get('page', 1),
            totalPerPage: $modeloAvaliacaoIndexRequest->get('totalPerPage', 15),
            filter: $modeloAvaliacaoIndexRequest->get('filter', null),
        );

        $filters = ['filter' => $modeloAvaliacaoIndexRequest->get('filter', null)];

        return view('app.modelo-avaliacao.index', compact('modeloAvaliacao', 'filters'));
    }
}
