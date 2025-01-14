<?php

namespace App\Repositories\Avaliacao;

use App\DTO\Avaliacao\AvaliacaoStoreDTO;
use App\DTO\Avaliacao\AvaliacaoUpdateDTO;
use App\Enums\SituacaoAvaliacaoEnum;
use App\Models\Avaliacao;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class AvaliacaoEloquentRepository implements AvaliacaoRepositoryInterface
{
    protected $model;

    public function __construct(Avaliacao $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function totalQuantity() : int {
        return $this->model->count();
    }

    public function find(string $uuid): Avaliacao
    {
        return $this->model
            ->with('servidores')
            ->where('uuid', $uuid)->first();
    }

    // public function new(AvaliacaoStoreDTO $dto): Avaliacao
    // {
    //     return $this->model->create((array) $dto);
    // }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query();

        if(!is_null($filter)) {
            $query->where("nome", "like", "%".$filter."%");
            $query->orWhere("situacao", "like", "%".$filter."%");
        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    // public function update(AvaliacaoUpdateDTO $dto): Avaliacao
    // {
    //     $this->model->where("uuid", $dto->uuid)->update((array)$dto);

    //     return $this->find($dto->uuid);
    // }

    // public function ativos()
    // {
    //     return $this->model->where('situacao', SituacaoAvaliacaoEnum::ATIVO)
    //     ->orderBy('nome', 'asc')
    //     ->get();
    // }
}
