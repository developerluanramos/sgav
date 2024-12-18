<?php

namespace App\Actions\Avaliador;

use App\Repositories\Avaliador\AvaliadorRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;

class AvaliadorIndexAction
{
    public function __construct(
        protected AvaliadorRepositoryInterface $avaliadorRepository,
        protected VinculoRepositoryInterface $vinculoRepository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->avaliadorRepository->paginate($page, $totalPerPage, $filter);
    }
}