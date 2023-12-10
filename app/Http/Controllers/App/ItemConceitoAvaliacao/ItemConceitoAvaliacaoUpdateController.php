<?php

namespace App\Http\Controllers\App\ItemConceitoAvaliacao;

use App\Actions\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateAction;
use App\DTO\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateRequest;

class ItemConceitoAvaliacaoUpdateController extends Controller
{
    public function __construct(
        protected ItemConceitoAvaliacaoUpdateAction $updateAction,
    ) { }

    public function update(ItemConceitoAvaliacaoUpdateRequest $request)
    {
        $this->updateAction->exec(ItemConceitoAvaliacaoUpdateDTO::makeFromRequest($request));

        return redirect()->back();
    }
}
