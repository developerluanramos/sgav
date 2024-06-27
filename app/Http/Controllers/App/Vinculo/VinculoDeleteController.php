<?php

namespace App\Http\Controllers\App\Vinculo;

use App\Actions\Vinculo\VinculoDeleteAction;
use App\DTO\Vinculo\VinculoDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Vinculo\VinculoDeleteRequest;

class VinculoDeleteController extends Controller
{
    public function __construct(
        protected VinculoDeleteAction $deleteAction,
    ) { }

    public function delete(VinculoDeleteRequest $request)
    {
        $this->deleteAction->exec(VinculoDeleteDTO::makeFromRequest($request));

        return redirect()->back()->with('message', 'Registro deletado com sucesso');
    }
}
