<?php

namespace App\DTO\FatorAvaliacao;

use App\Http\Requests\App\FatorAvaliacao\FatorAvaliacaoUpdateRequest;

class FatorAvaliacaoUpdateDTO {
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $conceito_avaliacao_uuid,
    ) {}

    public static function makeFromRequest(FatorAvaliacaoUpdateRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->conceito_avaliacao_uuid,
        );
    }
}
