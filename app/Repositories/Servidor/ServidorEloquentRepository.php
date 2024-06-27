<?php

namespace App\Repositories\Servidor;

use App\DTO\Servidor\ServidorStoreDTO;
use App\DTO\Servidor\ServidorUpdateDTO;
use App\Enums\SituacaoEquipeEnum;
use App\Models\Servidor;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class ServidorEloquentRepository implements ServidorRepositoryInterface
{
    public function __construct(
        protected Servidor $model
    ){ }

    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function totalQuantity() : int {
        return $this->model->count();
    }

    public function find(string $uuid): Servidor
    {
        return $this->model->where("uuid", $uuid)->first();
    }

    public function new(ServidorStoreDTO $servidorStoreDTO): Servidor
    {
        return $this->model->create((array)$servidorStoreDTO);
    }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query();

        if (!is_null($filter)) {
            $query->where(function ($subquery) use ($filter) {
                $subquery->where("nome", "like", "%{$filter}%")
                        ->orWhere("data_nascimento", "like", "%{$filter}%");
            });
        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function update(ServidorUpdateDTO $servidorUpdateDTO): Servidor
    {
        $this->model->where("uuid", $servidorUpdateDTO->uuid)->update((array)$servidorUpdateDTO);

        return $this->find($servidorUpdateDTO->uuid);
    }

    public function ativos()
    {
        return $this->model->where('situacao', SituacaoEquipeEnum::ATIVO)
        ->orderBy('nome', 'asc')
        ->get();
    }
}
