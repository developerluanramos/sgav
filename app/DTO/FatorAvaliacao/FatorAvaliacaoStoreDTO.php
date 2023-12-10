<?php

namespace App\DTO\FatorAvaliacao;

use App\Http\Requests\App\FatorAvaliacao\FatorAvaliacaoStoreRequest;

class FatorAvaliacaoStoreDTO {
    public function __construct(
        public string $nome,
        public string $conceito_avaliacao_uuid,
        public string $modelo_avaliacao_uuid
    ) {}

    public static function makeFromRequest(FatorAvaliacaoStoreRequest $request): self
    {
        return new self(
            $request->nome,
            $request->conceito_avaliacao_uuid,
            $request->modelo_avaliacao_uuid
        );
    }
}
