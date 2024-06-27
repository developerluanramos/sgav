<?php

namespace App\DTO\CicloAvaliativoModeloAvaliacao;

use App\Http\Requests\App\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreRequest;

class ModeloAvaliacaoStoreDTO {
    public function __construct(
        public array $modelosAvaliacaoUuid,
        public ?string $ciclosAvaliativosUuid,
    ) {}

    public static function makeFromRequest(ModeloAvaliacaoStoreRequest $request): self
    {
        return new self(
            $request->modelosAvaliacaoUuid,
            $request->get('ciclosAvaliativosUuid'),
        );
    }
}
