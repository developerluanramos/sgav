<?php

namespace App\Actions\ItemConceitoAvaliacao;

use App\DTO\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateDTO;
use App\Models\ItemConceitoAvaliacao;
use App\Repositories\ItemConceitoAvaliacao\ItemConceitoAvaliacaoRepositoryInterface;

class ItemConceitoAvaliacaoUpdateAction {
    public function __construct(
        protected ItemConceitoAvaliacaoRepositoryInterface $repository
    )
    { }

    public function exec(ItemConceitoAvaliacaoUpdateDTO $dto): ItemConceitoAvaliacao
    {
        return $this->repository->update($dto);
    }
}