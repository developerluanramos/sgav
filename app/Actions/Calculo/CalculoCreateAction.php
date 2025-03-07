<?php

namespace App\Actions\Calculo;

use App\Models\Calculo;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;

class CalculoCreateAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $repository
    ) { }

    public function exec(string $cicloAvaliativoUuid): array
    {
        $cicloAvaliativo = $this->repository->find($cicloAvaliativoUuid);

        return [
            "cicloAvaliativo" => $cicloAvaliativo
        ];
    }
}
