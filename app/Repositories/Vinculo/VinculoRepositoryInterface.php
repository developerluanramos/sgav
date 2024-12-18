<?php

namespace App\Repositories\Vinculo;

use App\DTO\Vinculo\VinculoStoreDTO;
use App\DTO\Vinculo\VinculoUpdateDTO;
use App\Models\Vinculo;
use App\Repositories\Interfaces\PaginationInterface;

interface VinculoRepositoryInterface
{
    public function new(VinculoStoreDTO $vinculoStoreDTO): Vinculo;

    public function find(string $uuid): Vinculo;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function paginateAvaliadores(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function update(VinculoUpdateDTO $dto): Vinculo;

    public function delete(string $uuid): void;
}
