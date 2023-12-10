<?php

namespace App\Http\Controllers\App\ItemConceitoAvaliacao;

use App\Actions\ItemConceitoAvaliacao\ItemConceitoAvaliacaoDeleteAction;
use App\DTO\ItemConceitoAvaliacao\ItemConceitoAvaliacaoDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoDeleteRequest;

class ItemConceitoAvaliacaoDeleteController extends Controller
{
    public function __construct(
        protected ItemConceitoAvaliacaoDeleteAction $deleteAction,
    ) { }

    public function delete(ItemConceitoAvaliacaoDeleteRequest $request)
    {
        $this->deleteAction->exec(ItemConceitoAvaliacaoDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}
