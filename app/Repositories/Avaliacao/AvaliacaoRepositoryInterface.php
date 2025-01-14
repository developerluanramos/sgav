<?php

namespace App\Repositories\Avaliacao;

use App\DTO\Avaliacao\AvaliacaoStoreDTO;
use App\DTO\Avaliacao\AvaliacaoUpdateDTO;
use App\Models\Avaliacao;
use App\Repositories\Interfaces\PaginationInterface;

interface AvaliacaoRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Avaliacao;

    // public function new(AvaliacaoStoreDTO $dto): Avaliacao;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    // public function update(AvaliacaoUpdateDTO $dto): Avaliacao;

    // public function ativos();
}
