<?php

namespace App\DTO\Avaliador;

use App\Enums\SituacaoAvaliadorEnum;
use App\Http\Requests\App\Avaliador\AvaliadorStoreRequest;
use App\Models\Vinculo;
use Illuminate\Support\Str;
class AvaliadorStoreDTO {
    public function __construct(
        public string $uuid,
        public string $vinculo_uuid
    ) {}

    // public static function makeFromRequest(AvaliadorStoreRequest $request): self
    // {
    //     return new self(
    //         $request->nome,
    //         SituacaoAvaliadorEnum::getValue(SituacaoAvaliadorEnum::getKey((int)$request->situacao))
    //     );
    // }

    public static function makeFromVinculo(Vinculo $vinculo)
    {
        return new self(
            Str::uuid(),
            $vinculo->uuid
        );
    }
}