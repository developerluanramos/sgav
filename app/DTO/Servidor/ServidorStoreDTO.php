<?php

namespace App\DTO\Servidor;

use App\DTO\BaseDTO;
use App\Enums\CargoEnum;
use App\Http\Requests\App\Servidor\ServidorStoreRequest;

class ServidorStoreDTO extends BaseDTO
{
    public function __construct(
        public string $nome,
        public string $email,
        public string $data_nascimento,
        public string $data_admissao,
        public string $cargo_uuid,
        public string $equipe_uuid,
        public string $matricula
    ){ }

    public static function makeFromRequest(ServidorStoreRequest $request)
    {
        return new self(
            $request->input('nome', ''), // Garante que $name nunca seja nulo
            $request->input('email', ''),
            $request->input('data_nascimento', ''),
            $request->input('data_admissao', ''),
            $request->input('cargo_uuid', ''),
            $request->input('equipe_uuid', ''),
            $request->input('matricula', '')
        );
    }
}
