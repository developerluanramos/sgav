<?php

namespace App\DTO\RegraPontuacao;

use App\Http\Requests\App\RegraPontuacao\RegraPontuacaoStoreRequest;

class RegraPontuacaoStoreDTO {
    public function __construct(
        public string $ciclos_avaliativos_uuid,
        public array $regras_pontuacao_ciclo,
        public array $regras_pontuacao_periodo,
        public array $regras_pontuacao_avaliacao
    ) {}

    public static function makeFromRequest(RegraPontuacaoStoreRequest $request): self
    {
        return new self(
            $request->ciclos_avaliativos_uuid,
            $request->regras_pontuacao_ciclo,
            $request->regras_pontuacao_periodo,
            $request->regras_pontuacao_avaliacao,
        );
    }
}
