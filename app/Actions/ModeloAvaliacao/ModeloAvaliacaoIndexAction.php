<?php

namespace App\Actions\ModeloAvaliacao;

use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;

class ModeloAvaliacaoIndexAction
{
    public function __construct(
        protected ModeloAvaliacaoRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}