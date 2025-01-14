<?php

namespace App\DTO\CicloAvaliativo;

use App\Http\Requests\App\CicloAvaliativo\CicloAvaliativoShowRequest;

class CicloAvaliativoShowDTO {
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(CicloAvaliativoShowRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}