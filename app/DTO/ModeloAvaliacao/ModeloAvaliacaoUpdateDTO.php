<?php

namespace App\DTO\ModeloAvaliacao;

use App\Enums\FinalidadeModeloAvaliacaoEnum;
use App\Enums\SituacaoModeloAvaliacaoEnum;
use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoUpdateRequest;

class ModeloAvaliacaoUpdateDTO {
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $situacao,
        public string $finalidade
    ) {}

    public static function makeFromRequest(ModeloAvaliacaoUpdateRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            SituacaoModeloAvaliacaoEnum::getValue(SituacaoModeloAvaliacaoEnum::getKey((int)$request->situacao)),
            FinalidadeModeloAvaliacaoEnum::getValue($request->finalidade),
        );
    }
}