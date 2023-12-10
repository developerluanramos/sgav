<?php

namespace App\Actions\ConceitoAvaliacao;

use App\Repositories\ItemConceitoAvaliacao\ItemConceitoAvaliacaoRepositoryInterface;

class ConceitoAvaliacaoCreateAction
{
    public function __construct(
        protected ItemConceitoAvaliacaoRepositoryInterface $itemConceitoAvaliacaoRepositoryInterface
    ) { }

    public function exec(): array
    {
        return [];
    }
}
