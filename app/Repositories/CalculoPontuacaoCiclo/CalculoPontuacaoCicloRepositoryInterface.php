<?php

namespace App\Repositories\CalculoPontuacaoCiclo;

use App\DTO\Calculo\CalculoStoreDTO;
use Illuminate\Database\Eloquent\Collection;

interface CalculoPontuacaoCicloRepositoryInterface
{
    public function all();

    public function byCicloAvaliativoUuid(string $cicloAvaliativoUuid): Collection;

    public function new(CalculoStoreDTO $calculoStoreDTO): bool;

    public function porCicloAvaliativoETotalPontos(string $cicloAvaliativoUuid, float $totalPontos);

}
