<?php

namespace App\DTO\VinculoAvaliacao;

use App\Http\Requests\App\VinculoAvaliacao\VinculoAvaliacaoStoreRequest;

class VinculoAvaliacaoStoreDTO {
    public function __construct(
        public string $ciclos_avaliativos_uuid,
        public string $ciclos_uuid,
        public string $periodos_uuid,
        public string $avaliacoes_uuid,
        public string $vinculos_uuid
    ) {}

    public static function makeFromRequest(VinculoAvaliacaoStoreRequest $request): self
    {
        return new self(
            $request->ciclos_avaliativos_uuid,
            $request->ciclos_uuid,
            $request->periodos_uuid,
            $request->avaliacoes_uuid,
            $request->vinculos_uuid
        );
    }
}