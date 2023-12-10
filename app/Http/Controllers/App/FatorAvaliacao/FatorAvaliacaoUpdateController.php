<?php

namespace App\Http\Controllers\App\FatorAvaliacao;

use App\Actions\FatorAvaliacao\FatorAvaliacaoUpdateAction;
use App\DTO\FatorAvaliacao\FatorAvaliacaoUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\FatorAvaliacao\FatorAvaliacaoUpdateRequest;

class FatorAvaliacaoUpdateController extends Controller
{
    public function __construct(
        protected FatorAvaliacaoUpdateAction $updateAction
    ) {}

    public function update(FatorAvaliacaoUpdateRequest $updateRequest)
    {
        $this->updateAction->exec(FatorAvaliacaoUpdateDTO::makeFromRequest($updateRequest));

        return redirect()->back()->with('message', 'Registro atualizado');
    }
}
