<?php

namespace App\Actions\Avaliador;

use App\DTO\Avaliador\AvaliadorShowDTO;
use App\Models\Avaliador;
use App\Repositories\Avaliador\AvaliadorRepositoryInterface;

class AvaliadorShowAction {
    public function __construct(
        protected AvaliadorRepositoryInterface $repository,
        // protected VinculoRepositoryInterface $vinculoRepository
    ) { }

    public function exec(AvaliadorShowDTO $dto): Avaliador 
    {
        return $this->repository->find($dto->uuid);
    }
}