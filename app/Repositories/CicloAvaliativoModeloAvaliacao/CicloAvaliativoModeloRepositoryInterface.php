<?php

namespace App\Repositories\CicloAvaliativoModeloAvaliacao;

use App\DTO\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreDTO;
use App\Models\ModeloAvaliacao;

interface CicloAvaliativoModeloRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): ModeloAvaliacao;

    public function new(string $cicloAvaliativoUuid, ModeloAvaliacaoStoreDTO $dto): ModeloAvaliacao;

    public function newVarious(string $cicloAvaliativoUuid, array $modelosAvaliacaoUuid): void;

}
