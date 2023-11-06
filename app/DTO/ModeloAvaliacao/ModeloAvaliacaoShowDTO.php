<?php

namespace App\DTO\ModeloAvaliacao;

use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoShowRequest;

class ModeloAvaliacaoShowDTO {
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(ModeloAvaliacaoShowRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}