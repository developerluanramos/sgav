<?php

namespace App\Repositories\CicloAvaliativoIncidencia;

use App\DTO\CicloAvaliativoIncidencia\IncidenciaStoreDTO;
use App\Models\CicloAvaliativoIncidencia;

interface IncidenciaRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): CicloAvaliativoIncidencia;

    public function new(string $cicloAvaliativoUuid, IncidenciaStoreDTO $dto): CicloAvaliativoIncidencia;

}
