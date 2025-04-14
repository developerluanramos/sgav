<?php

namespace App\DTO\RegraPontuacao;

use App\Http\Requests\App\RegraPontuacao\RegraPontuacaoStoreRequest;

class RegraPontuacaoStoreDTO {
    public function __construct(
        public string $ciclos_avaliativos_uuid,
        public array|string $regras_pontuacao_ciclo,
        public array|string $regras_pontuacao_periodo,
        public array|string $regras_pontuacao_avaliacao
    ) {}

    public static function makeFromRequest(RegraPontuacaoStoreRequest $request): self
    {
        return new self(
            $request->ciclos_avaliativos_uuid,
            json_decode($request->regras_pontuacao_ciclo, true),
            json_decode($request->regras_pontuacao_periodo, true),
            json_decode($request->regras_pontuacao_avaliacao, true)
        );
    }
}
