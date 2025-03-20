<?php

namespace App\Http\Controllers\App\VinculoAvaliacao;

use App\Actions\VinculoAvaliacao\VinculoAvaliacaoStoreAction;
use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\VinculoAvaliacao\VinculoAvaliacaoStoreRequest;
use Illuminate\Http\Request as HttpRequest;


class VinculoAvaliacaoStoreController extends Controller
{
    public function __construct(
        protected VinculoAvaliacaoStoreAction $action
    ) { }

    public function store(string $cicloAvaliativoUuid, string $vinculoUuid, VinculoAvaliacaoStoreRequest $request)
    {
        $request->merge([
            'ciclos_avaliativos_uuid' => $cicloAvaliativoUuid,
            "vinculos_uuid" => $vinculoUuid
        ]);
        
        $this->action->exec(VinculoAvaliacaoStoreDTO::makeFromRequest($request));

        return redirect()->to(route('avaliacao.create', [
            'cicloAvaliativoUuid' => $cicloAvaliativoUuid,
            'vinculoUuid' => $vinculoUuid
        ]));
    }
}
