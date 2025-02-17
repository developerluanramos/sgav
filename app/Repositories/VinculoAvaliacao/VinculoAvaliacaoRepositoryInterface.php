<?php

namespace App\Repositories\VinculoAvaliacao;

use App\DTO\Vinculo\VinculoStoreDTO;
use App\DTO\Vinculo\VinculoUpdateDTO;
use App\Models\Vinculo;
use App\Repositories\Interfaces\PaginationInterface;

interface VinculoAvaliacaoRepositoryInterface
{
    public function detailsByVinculoUuidECiclosAvaliativosUuid(string $cicloAvaliativoUuid, string $vinculoUuid) : array;
}
