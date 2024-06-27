<?php

namespace App\Actions\CicloAvaliativo;

use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class CicloAvaliativoIndexAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $repository
    ) { }
    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}
