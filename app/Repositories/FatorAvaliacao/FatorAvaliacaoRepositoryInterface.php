<?php

namespace App\Repositories\FatorAvaliacao;

use App\DTO\FatorAvaliacao\FatorAvaliacaoStoreDTO;
use App\DTO\FatorAvaliacao\FatorAvaliacaoUpdateDTO;
use App\Models\FatorAvaliacao;

interface FatorAvaliacaoRepositoryInterface
{
    public function new(FatorAvaliacaoStoreDTO $fatorAvaliacaoStoreDTO): FatorAvaliacao;

    public function find($uuid): FatorAvaliacao;

    public function update(FatorAvaliacaoUpdateDTO $dto): bool;
}
