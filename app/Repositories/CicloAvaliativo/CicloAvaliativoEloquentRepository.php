<?php

namespace App\Repositories\CicloAvaliativo;

use App\DTO\CicloAvaliativo\CicloAvaliativoStoreDTO;
use App\Models\CicloAvaliativo;
use App\Models\Vinculo;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;
use Illuminate\Database\Eloquent\Collection;

class CicloAvaliativoEloquentRepository implements CicloAvaliativoRepositoryInterface
{
    protected $model;

    public function __construct(CicloAvaliativo $model)
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

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model;

//        if(!is_null($filter)) {
//            $query->where("nome", "like", "%".$filter."%");
//            $query->orWhere("situacao", "like", "%".$filter."%");
//        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function find(string $uuid): CicloAvaliativo
    {
        return $this->model
            ->where('uuid', $uuid)->first();
    }

    public function new(CicloAvaliativoStoreDTO $dto): CicloAvaliativo
    {
        return $this->model->create((array)$dto);
    }

    public function update($uuid, $data): CicloAvaliativo
    {
        $this->model->where("uuid", $uuid)->update($data);

        return $this->find($uuid);
    }

    public function show(string $uuid): CicloAvaliativo
    {
        return $this->model
            ->with('periodicidade', 'incidencia', 'modelos.fatoresAvaliacao.indicadoresDesempenho.conceitoAvaliacao.itensConceitosAvaliacao')
            ->where('uuid', $uuid)->first();
    }

    public function avaliados(string $uuid): Collection
    {
        // $cicloAvaliativo = $this->find($uuid);
        // dd($cicloAvaliativo->periodicidade);
        return Vinculo::where('avaliador', false)->limit(10)->get();
    }
}
