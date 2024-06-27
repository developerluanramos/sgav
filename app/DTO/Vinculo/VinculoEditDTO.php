<?php

namespace App\DTO\Vinculo;

use App\DTO\BaseDTO;
use App\Http\Requests\App\Vinculo\VinculoEditRequest;

class VinculoEditDTO extends BaseDTO
{
    public function __construct(
        public string $uuid
    ){ }

    public static function makeFromRequest(VinculoEditRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}
