<?php

namespace App\Actions\Servidor;

use App\Repositories\Servidor\ServidorRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class ServidorIndexAction
{
    public function __construct(
        protected ServidorRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}
