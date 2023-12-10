<?php

namespace App\Http\Controllers\App\FatorAvaliacao;

use App\Actions\FatorAvaliacao\FatorAvaliacaoStoreAction;
use App\DTO\FatorAvaliacao\FatorAvaliacaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\FatorAvaliacao\FatorAvaliacaoStoreRequest;
use App\Models\FatorAvaliacao;

class FatorAvaliacaoStoreController extends Controller
{

    public function __construct(
        protected FatorAvaliacaoStoreAction $action
    ) { }

    public function store(string $modeloAvaliacaoUuid, FatorAvaliacaoStoreRequest $fatorAvaliacaoStoreRequest)
    {

        $fatorAvaliacaoStoreRequest->merge([
            "modelo_avaliacao_uuid" => $modeloAvaliacaoUuid,
        ]);

        $this->action->exec(FatorAvaliacaoStoreDTO::makeFromRequest($fatorAvaliacaoStoreRequest));

        return redirect()->route('modelo-avaliacao.edit', $modeloAvaliacaoUuid);
    }

    public function destroy($uuid)
    {

        $fatorAvaliacao = FatorAvaliacao::where('uuid', $uuid)->first();
        $fatorAvaliacao->delete();


        return redirect()->back();
    }

}
