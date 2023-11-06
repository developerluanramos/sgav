<?php

namespace App\Actions\ModeloAvaliacao;

use App\DTO\ModeloAvaliacao\ModeloAvaliacaoEditDTO;
use App\Models\ModeloAvaliacao;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;

class ModeloAvaliacaoEditAction {
    public function __construct(
        protected ModeloAvaliacaoRepositoryInterface $repository
    )
    { }

    public function exec(ModeloAvaliacaoEditDTO $dto): ModeloAvaliacao
    {
        return $this->repository->find($dto->uuid);
    }
}