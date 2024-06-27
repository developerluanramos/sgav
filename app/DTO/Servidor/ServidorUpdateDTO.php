<?php

namespace App\DTO\Servidor;

use App\DTO\BaseDTO;
use App\Http\Requests\App\Servidor\ServidorUpdateRequest;

class ServidorUpdateDTO extends BaseDTO
{
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $data_nascimento,
    ) { }

    public static function makeFromRequest(ServidorUpdateRequest $request)
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->data_nascimento,
        );
    }
}
