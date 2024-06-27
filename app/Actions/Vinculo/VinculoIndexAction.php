<?php

namespace App\Actions\Vinculo;

use App\Repositories\Vinculo\VinculoRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class VinculoIndexAction
{
    public function __construct(
        protected VinculoRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}
