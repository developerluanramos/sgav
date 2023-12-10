<?php

namespace App\DTO\ConceitoAvaliacao;

use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoStoreRequest;

class ConceitoAvaliacaoStoreDTO {
    public function __construct(
        public string $descricao,
        public array $itens_conceitos_avaliacao
    ) {}

    public static function makeFromRequest(ConceitoAvaliacaoStoreRequest $request): self
    {
        return new self(
            $request->descricao,
            $request->itens_conceitos_avaliacao
        );
    }
}
