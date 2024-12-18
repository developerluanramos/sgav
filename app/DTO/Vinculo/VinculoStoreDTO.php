<?php

namespace App\DTO\Vinculo;

use App\DTO\BaseDTO;
use App\Http\Requests\App\Vinculo\VinculoStoreRequest;

class VinculoStoreDTO extends BaseDTO
{
    public function __construct(
        public string $servidor_uuid,
        public string $cargo_uuid,
        public string $equipe_uuid,
        public string $postos_trabalho_uuid,
        public string $setores_uuid,
        public string $departamentos_uuid,
        public string $email,
        public string $data_admissao,
        public string $matricula,
        public string $avaliador,
    ){}

    public static function makeFromRequest(VinculoStoreRequest $request)
    {
        return new self(
            $request->servidor_uuid,
            $request->cargo_uuid,
            $request->equipe_uuid,
            $request->postos_trabalho_uuid,
            $request->setores_uuid,
            $request->departamentos_uuid,
            $request->email,
            $request->data_admissao,
            $request->matricula,
            $request->avaliador == "true" ? 1 : 0 
        );
    }
}
