<?php

namespace App\Http\Controllers\App\Vinculo;

use App\Actions\Vinculo\VinculoIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Vinculo\VinculoIndexRequest;

class VinculoIndexController extends Controller
{
    public function __construct(
        protected VinculoIndexAction $indexAction
    ) {}

    public function index(VinculoIndexRequest $vinculosIndexRequest)
    {
        $vinculos = $this->indexAction->exec(
            page: $vinculosIndexRequest->get('page', 1),
            totalPerPage: $vinculosIndexRequest->get('totalPerPage', 15),
            filter: $vinculosIndexRequest->get('filter', null),
        );

        $filters = ['filter' => $vinculosIndexRequest->get('filter', null)];

        return view('app.vinculo.index', compact('vinculos', 'filters'));
    }
}
