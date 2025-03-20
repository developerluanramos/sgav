<?php

namespace App\Repositories\ConceitoAvaliacao;

use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoStoreDTO;
use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoUpdateDTO;
use App\Models\ConceitoAvaliacao;
use App\Repositories\Interfaces\PaginationInterface;

interface ConceitoAvaliacaoRepositoryInterface
{
    public function new(ConceitoAvaliacaoStoreDTO $conceitoAvaliacaoStoreDTO): ConceitoAvaliacao;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function find(string $uuid): ConceitoAvaliacao;

    public function update(ConceitoAvaliacaoUpdateDTO $dto): ConceitoAvaliacao;

    public function all(): array;

    public function totalPontosPorItensUuid(array $itensUuid) : float;
}
