<?php

namespace App\DTO\CicloAvaliativo;

use App\Enums\CicloAvaliativoStatusEnum;
use App\Http\Requests\App\CicloAvaliativo\CicloAvaliativoStoreRequest;

class CicloAvaliativoStoreDTO {
    public function __construct(
        public string $iniciado_em,
        public string $finalizado_em,
        public string $status,
        public string $descricao,
        public array $ciclos,
        
    ) {}

    public static function makeFromRequest(CicloAvaliativoStoreRequest $request): self
    {
        return new self(
            $request->iniciado_em,
            $request->finalizado_em,
            CicloAvaliativoStatusEnum::RASCUNHO,
            $request->descricao,
            json_decode($request->ciclos, true),
            
        );
    }
}
