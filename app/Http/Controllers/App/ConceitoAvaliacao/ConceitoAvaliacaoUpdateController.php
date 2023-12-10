<?php

namespace App\Http\Controllers\App\ConceitoAvaliacao;

use App\Actions\ConceitoAvaliacao\ConceitoAvaliacaoUpdateAction;
use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoUpdateRequest;

class ConceitoAvaliacaoUpdateController extends Controller
{
    public function __construct(
        protected ConceitoAvaliacaoUpdateAction $updateAction
    ) {}

    public function update(ConceitoAvaliacaoUpdateRequest $updateRequest)
    {
        $this->updateAction->exec(ConceitoAvaliacaoUpdateDTO::makeFromRequest($updateRequest));

        return redirect()->back();
    }
}
