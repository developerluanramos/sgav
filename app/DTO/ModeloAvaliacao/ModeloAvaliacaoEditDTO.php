<?php

namespace App\DTO\ModeloAvaliacao;

use App\Http\Requests\App\ModeloAvaliacao\ModeloAvaliacaoEditRequest;

class ModeloAvaliacaoEditDTO {
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(ModeloAvaliacaoEditRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}