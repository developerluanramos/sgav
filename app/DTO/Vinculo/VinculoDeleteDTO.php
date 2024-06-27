<?php

namespace App\DTO\Vinculo;

use App\Http\Requests\App\Vinculo\VinculoDeleteRequest;

class VinculoDeleteDTO {
    public function __construct(
        public string $uuid
    ) {}

    public static function makeFromRequest(VinculoDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}
