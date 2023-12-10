<?php

namespace App\Actions\ConceitoAvaliacao;

use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class ConceitoAvaliacaoIndexAction
{
    public function __construct(
        protected ConceitoAvaliacaoRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}