<?php

namespace App\DTO\ItemConceitoAvaliacao;

use App\Http\Requests\App\ItemConceitoAvaliacao\ItemConceitoAvaliacaoDeleteRequest;

class ItemConceitoAvaliacaoDeleteDTO {
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(ItemConceitoAvaliacaoDeleteRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}