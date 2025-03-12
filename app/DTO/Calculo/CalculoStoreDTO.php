<?php

namespace App\DTO\Calculo;

use App\Http\Requests\App\Calculo\CalculoStoreRequest;

class CalculoStoreDTO {
    public function __construct(
        public string $ciclos_avaliativos_uuid,
        public array $regras_pontuacao_ciclo
    ) {}

    public static function makeFromRequest(CalculoStoreRequest $request): self
    {
        return new self(
            $request->ciclos_avaliativos_uuid,
            $request->regras_pontuacao_ciclo
        );
    }
}
