<?php

namespace App\DTO\ModeloAvaliacao;

use App\Enums\FinalidadeModeloAvaliacaoEnum;
use App\Enums\SituacaoModeloAvaliacaoEnum;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoStoreRequest;

class ModeloAvaliacaoStoreDTO {
    public function __construct(
        public string $nome,
        public string $situacao,
        public string $finalidade
    ) {}

    public static function makeFromRequest(ModeloAvaliacaoStoreRequest $request): self
    {
        return new self(
            $request->nome,
            SituacaoModeloAvaliacaoEnum::getValue(SituacaoModeloAvaliacaoEnum::getKey((int)$request->situacao)),
            FinalidadeModeloAvaliacaoEnum::getValue($request->finalidade),
        );
    }
}