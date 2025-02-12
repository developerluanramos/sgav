<?php

namespace App\DTO\CicloAvaliativoIncidencia;

use App\Http\Requests\App\CicloAvaliativoIncidencia\IncidenciaStoreRequest;

class IncidenciaStoreDTO {
    public function __construct(
        public string $cargo_uuid,
        public string $equipe_uuid,
        public string $departamentos_uuid,
        public string $setores_uuid,
        public string $postos_trabalho_uuid,
        public string $ciclos_avaliativos_uuid,
    ) {}

    public static function makeFromRequest(IncidenciaStoreRequest $request): self
    {
        return new self(
            $request->cargo_uuid,
            $request->equipe_uuid,
            $request->departamentos_uuid,
            $request->setores_uuid,
            $request->postos_trabalho_uuid,
            $request->ciclos_avaliativos_uuid
        );
    }
}
