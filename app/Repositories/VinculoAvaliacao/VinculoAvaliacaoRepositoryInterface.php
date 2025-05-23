<?php

namespace App\Repositories\VinculoAvaliacao;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Models\VinculoAvaliacao;

interface VinculoAvaliacaoRepositoryInterface
{
    public function detailsByVinculoUuidECiclosAvaliativosUuid(string $cicloAvaliativoUuid, string $vinculoUuid) : array;

    public function new(VinculoAvaliacaoStoreDTO $dto) : VinculoAvaliacao;

    public function totalPontosPorPeridoEVinculoUuid(string $periodoUuid, string $vinculosUuid) : float;

    public function update(VinculoAvaliacaoStoreDTO $dto) : bool;
}
