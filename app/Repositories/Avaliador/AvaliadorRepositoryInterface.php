<?php

namespace App\Repositories\Avaliador;

use App\DTO\Avaliador\AvaliadorStoreDTO;
// use App\DTO\Avaliador\AvaliadorUpdateDTO;
use App\Models\Avaliador;
use App\Repositories\Interfaces\PaginationInterface;
use Illuminate\Database\Eloquent\Collection;

interface AvaliadorRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Avaliador;

    public function new(AvaliadorStoreDTO $dto): Avaliador;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    // public function update(AvaliadorUpdateDTO $dto): Avaliador;

    // public function ativos();
}
