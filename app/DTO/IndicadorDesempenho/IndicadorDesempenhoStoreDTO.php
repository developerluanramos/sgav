<?php

namespace App\DTO\IndicadorDesempenho;

use App\Http\Requests\App\IndicadorDesempenho\IndicadorDesempenhoStoreRequest;

class IndicadorDesempenhoStoreDTO {
    public function __construct(
        public string $descricao,
        public string $conceito_avaliacao_uuid,
        public string $modelo_avaliacao_uuid,
        public string $fator_avaliacao_uuid
    ) {}

    public static function makeFromRequest(IndicadorDesempenhoStoreRequest $request): self
    {
        return new self(
            $request->descricao,
            $request->conceito_avaliacao_uuid,
            $request->modelo_avaliacao_uuid,
            $request->fator_avaliacao_uuid
        );
    }
}
