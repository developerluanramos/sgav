<?php

namespace App\DTO\CicloAvaliativoIncidencia;

use App\Http\Requests\App\CicloAvaliativoIncidencia\IncidenciaStoreRequest;

class IncidenciaStoreDTO {
    public function __construct(
        public array|string $funcoes,
        public array|string $locais_trabalho,
        public array|string $orgaos,
        public string $ciclos_avaliativos_uuid,
    ) {}

    public static function makeFromRequest(IncidenciaStoreRequest $request): self
    {
        return new self(
            json_encode($request->funcoes),
            json_encode($request->locais_trabalho),
            json_encode($request->orgaos),
            $request->ciclos_avaliativos_uuid
        );
    }
}
