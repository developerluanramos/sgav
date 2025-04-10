<?php

namespace App\Repositories\RegraPontuacaoPeriodo;

use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use Illuminate\Database\Eloquent\Collection;

interface RegraPontuacaoPeriodoRepositoryInterface
{
    public function all();

    public function byCicloAvaliativoUuid(string $cicloAvaliativoUuid): Collection;

    public function new(RegraPontuacaoStoreDTO $calculoStoreDTO): bool;

    public function porCicloAvaliativoETotalPontos(string $cicloAvaliativoUuid, float $totalPontos);

}
