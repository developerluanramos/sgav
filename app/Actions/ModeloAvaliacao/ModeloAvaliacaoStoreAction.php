<?php

namespace App\Actions\ModeloAvaliacao;

use App\DTO\ModeloAvaliacao\ModeloAvaliacaoStoreDTO;
use App\Models\ModeloAvaliacao;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;

class ModeloAvaliacaoStoreAction
{
    public function __construct(
        protected ModeloAvaliacaoRepositoryInterface $repository
    ) { }

    public function exec(ModeloAvaliacaoStoreDTO $dto): ModeloAvaliacao
    {
        return $this->repository->new($dto);
    }
}
