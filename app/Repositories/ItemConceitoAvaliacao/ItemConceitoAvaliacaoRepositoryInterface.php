<?php

namespace App\Repositories\ItemConceitoAvaliacao;

use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoStoreDTO;
use App\DTO\ItemConceitoAvaliacao\ItemConceitoAvaliacaoUpdateDTO;
use App\Models\ItemConceitoAvaliacao;

interface ItemConceitoAvaliacaoRepositoryInterface
{
    public function new(string $conceitoAvaliacaoUuid, array $itensConceitosAvaliacao): bool;

    public function findByUuid(string $uuid): ItemConceitoAvaliacao;
    
    public function delete(string $uuid): void;

    public function update(ItemConceitoAvaliacaoUpdateDTO $dto): ItemConceitoAvaliacao;

}
