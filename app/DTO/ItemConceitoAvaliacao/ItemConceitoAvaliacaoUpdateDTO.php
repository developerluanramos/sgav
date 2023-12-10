<?php

namespace App\DTO\ItemConceitoAvaliacao;

use App\Http\Requests\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateRequest;

class ItemConceitoAvaliacaoUpdateDTO {
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $pontuacao
    ) {}

    public static function makeFromRequest(ItemConceitoAvaliacaoUpdateRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->pontuacao,
        );
    }
}
