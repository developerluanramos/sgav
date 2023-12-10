<?php

namespace App\Http\Controllers\App\ConceitoAvaliacao;

use App\Actions\ConceitoAvaliacao\ConceitoAvaliacaoIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoIndexRequest;
use App\Models\ConceitoAvaliacao;

class ConceitoAvaliacaoIndexController extends Controller
{
    public function __construct(
        protected ConceitoAvaliacaoIndexAction $indexAction
    ) {}

    public function index(ConceitoAvaliacaoIndexRequest $conceitoAvaliacaoIndexRequest)
    {
        $conceitoAvaliacao = $this->indexAction->exec(
            page: $conceitoAvaliacaoIndexRequest->get('page', 1),
            totalPerPage: $conceitoAvaliacaoIndexRequest->get('totalPerPage', 15),
            filter: $conceitoAvaliacaoIndexRequest->get('filter', null),
        );

        $filters = ['filter' => $conceitoAvaliacaoIndexRequest->get('filter', null)];

        return view('app.conceito-avaliacao.index', compact('conceitoAvaliacao', 'filters'));
    }
}
