<?php

namespace App\Repositories\FatorAvaliacao;

use App\DTO\FatorAvaliacao\FatorAvaliacaoStoreDTO;
use App\DTO\FatorAvaliacao\FatorAvaliacaoUpdateDTO;
use App\Models\FatorAvaliacao;


class FatorAvaliacaoEloquentRepository implements FatorAvaliacaoRepositoryInterface
{
    public function __construct(
        protected FatorAvaliacao $model
    ){ }

    public function find($uuid): FatorAvaliacao
    {
        return $this->model->where('uuid', $uuid)->first();
    }

    public function new(FatorAvaliacaoStoreDTO $fatorAvaliacaoStoreDTO): FatorAvaliacao
    {
        return $this->model->create((array)$fatorAvaliacaoStoreDTO);
    }

    public function update(FatorAvaliacaoUpdateDTO $dto): bool
    {
        return $this->model->where("uuid", $dto->uuid)->update((array) $dto);
    }
}
