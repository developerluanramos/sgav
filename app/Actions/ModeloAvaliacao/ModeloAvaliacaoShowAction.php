<?php

namespace App\Actions\ModeloAvaliacao;

use App\DTO\ModeloAvaliacao\ModeloAvaliacaoShowDTO;
use App\Models\ModeloAvaliacao;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;

class ModeloAvaliacaoShowAction {
    public function __construct(
        protected ModeloAvaliacaoRepositoryInterface $repository
    ) { }

    public function exec(ModeloAvaliacaoShowDTO $dto): ModeloAvaliacao 
    {
        return $this->repository->find($dto->uuid);
    }
}