<?php

namespace App\DTO\Servidor;

use App\DTO\BaseDTO;
use App\Enums\CargoEnum;
use App\Http\Requests\App\Servidor\ServidorStoreRequest;

class ServidorStoreDTO extends BaseDTO
{
    public function __construct(
        public string $nome,
        public string $data_nascimento,
    ){ }

    public static function makeFromRequest(ServidorStoreRequest $request)
    {
        return new self(
            $request->input('nome', ''), // Garante que $name nunca seja nulo
            $request->input('data_nascimento', ''),
        );
    }
}
