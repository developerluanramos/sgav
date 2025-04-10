<?php

namespace App\Repositories\RegraPontuacaoAvaliacao;

use App\DTO\RegraPontuacao\RegraPontuacaoStoreDTO;
use Illuminate\Database\Eloquent\Collection;

interface RegraPontuacaoAvaliacaoRepositoryInterface
{
    public function all();

    public function byCicloAvaliativoUuid(string $cicloAvaliativoUuid): Collection;

    public function new(RegraPontuacaoStoreDTO $calculoStoreDTO): bool;

    public function porCicloAvaliativoETotalPontos(string $cicloAvaliativoUuid, float $totalPontos);

}
