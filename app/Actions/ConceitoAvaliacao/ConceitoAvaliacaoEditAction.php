<?php

namespace App\Actions\ConceitoAvaliacao;

use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoEditDTO;
use App\Models\ConceitoAvaliacao;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;

class ConceitoAvaliacaoEditAction {
    public function __construct(
        protected ConceitoAvaliacaoRepositoryInterface $repository
    )
    { }

    public function exec(ConceitoAvaliacaoEditDTO $dto): ConceitoAvaliacao
    {
        return $this->repository->find($dto->uuid);
    }
}