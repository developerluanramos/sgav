<?php

namespace App\DTO\ConceitoAvaliacao;

use App\Http\Requests\App\ConceitoAvaliacao\ConceitoAvaliacaoEditRequest;

class ConceitoAvaliacaoEditDTO {
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(ConceitoAvaliacaoEditRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}