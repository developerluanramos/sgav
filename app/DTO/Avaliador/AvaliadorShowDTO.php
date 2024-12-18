<?php

namespace App\DTO\Avaliador;

use App\Http\Requests\App\Avaliador\AvaliadorShowRequest;

class AvaliadorShowDTO {
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(AvaliadorShowRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}