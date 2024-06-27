<?php

namespace App\Repositories\CicloAvaliativoPeriodicidade;

use App\DTO\CicloAvaliativoPeriodicidade\PeriodicidadeStoreDTO;
use App\Models\Periodicidade;

interface PeriodicidadeRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Periodicidade;

    public function new(string $cicloAvaliativoUuid, PeriodicidadeStoreDTO $dto): Periodicidade;

}
