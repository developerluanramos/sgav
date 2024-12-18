<?php

namespace App\Repositories\Avaliador;

use App\DTO\Avaliador\AvaliadorStoreDTO;
use App\DTO\Avaliador\AvaliadorUpdateDTO;
use App\Enums\SituacaoAvaliadorEnum;
use App\Models\Avaliador;
use App\Models\Vinculo;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;
use Illuminate\Database\Eloquent\Collection;

class AvaliadorEloquentRepository implements AvaliadorRepositoryInterface
{
    protected $model;

    public function __construct(Avaliador $model)
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

    public function find(string $uuid): Avaliador
    {
        return $this->model
            ->with('vinculo.servidor')
            // ->with('avaliados.servidor')
            ->where('uuid', $uuid)->first();
    }

    public function new(AvaliadorStoreDTO $dto): Avaliador
    {
        return $this->model->create((array) $dto);
    }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query();

        // if(!is_null($filter)) {
        //     $query->where("nome", "like", "%".$filter."%");
        //     $query->orWhere("situacao", "like", "%".$filter."%");
        // }

        $query->with(['avaliados.servidor', 'vinculo.servidor'])->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);
        // $result = Vinculo::with('servidor')->where('avaliador', true)->paginate();
        
        return new PaginationPresenter($result);
    }

    // public function update(AvaliadorUpdateDTO $dto): Avaliador
    // {
    //     $this->model->where("uuid", $dto->uuid)->update((array)$dto);

    //     return $this->find($dto->uuid);
    // }

    // public function ativos()
    // {
    //     return $this->model->where('situacao', SituacaoAvaliadorEnum::ATIVO)
    //     ->orderBy('nome', 'asc')
    //     ->get();
    // }
}
