<?php

namespace App\Repositories\CicloAvaliativoIncidencia;

use App\DTO\CicloAvaliativoIncidencia\IncidenciaStoreDTO;
use App\Models\Incidencia;

interface IncidenciaRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Incidencia;

    public function new(string $cicloAvaliativoUuid, IncidenciaStoreDTO $dto): Incidencia;

}
