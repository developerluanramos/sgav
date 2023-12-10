<?php

namespace App\Actions\ItemConceitoAvaliacao;

use App\DTO\ItemConceitoAvaliacao\ItemConceitoAvaliacaoDeleteDTO;
use App\Repositories\ItemConceitoAvaliacao\ItemConceitoAvaliacaoRepositoryInterface;

class ItemConceitoAvaliacaoDeleteAction {
    public function __construct(
        protected ItemConceitoAvaliacaoRepositoryInterface $repository
    )
    { }

    public function exec(ItemConceitoAvaliacaoDeleteDTO $dto): void
    {
        $this->repository->delete($dto->uuid);
    }
}