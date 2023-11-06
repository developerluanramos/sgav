<?php

namespace App\DTO\Servidor;

use App\DTO\BaseDTO;
use App\Http\Requests\App\Servidor\ServidorShowRequest;

class ServidorShowDTO extends BaseDTO
{
    public function __construct(
        public string $uuid
    ){ }

    public static function makeFromRequest(ServidorShowRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}
