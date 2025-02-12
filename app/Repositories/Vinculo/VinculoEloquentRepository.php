<?php

namespace App\Repositories\Vinculo;

use App\DTO\Vinculo\VinculoStoreDTO;
use App\DTO\Vinculo\VinculoUpdateDTO;
use App\Models\Vinculo;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class VinculoEloquentRepository implements VinculoRepositoryInterface
{
    public function __construct(
        protected Vinculo $model
    ){}

    public function new(VinculoStoreDTO $vinculoStoreDTO): Vinculo
    {
        return $this->model->create((array)$vinculoStoreDTO);
    }

    public function find(string $uuid): Vinculo
    {
        return $this->model
            // ->with('servidor')
            ->where("uuid", $uuid)->first();
    }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query();


        if (!is_null($filter)) {
            $query->where(function ($subquery) use ($filter) {
                $subquery->where("nome", "like", "%{$filter}%")
                    ->orWhere("email", "like", "%{$filter}%")
                    // ->orWhere("data_nascimento", "like", "%{$filter}%")
                    ->orWhere("data_admissao", "like", "%{$filter}%")
                    ->orWhere("matricula", "like", "%{$filter}%");
            });
        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function paginateAvaliadores(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query()
            ->with('equipe')
            ->with('cargo')
            // ->with('servidor')
            ->with('postoTrabalho')
            ->with('setor')
            ->with('departamento');

        $query->where("avaliador", true);

        $query->orderBy('updated_at', 'desc');

        $query->orderBy('created_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function update(VinculoUpdateDTO $dto): Vinculo
    {
        $this->model->where("uuid", $dto->uuid)->update((array) $dto);

        return $this->find($dto->uuid);
    }

    public function delete(string $uuid): void
    {
        $vinculo = $this->find($uuid);

        $vinculo->delete();
    }
}
