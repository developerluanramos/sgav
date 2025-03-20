<?php

namespace App\Repositories\ConceitoAvaliacao;

use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoStoreDTO;
use App\DTO\ConceitoAvaliacao\ConceitoAvaliacaoUpdateDTO;
use App\Models\ConceitoAvaliacao;
use App\Models\ItemConceitoAvaliacao;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class ConceitoAvaliacaoEloquentRepository implements ConceitoAvaliacaoRepositoryInterface
{
    public function __construct(
        protected ConceitoAvaliacao $model
    ){ }

    public function new(ConceitoAvaliacaoStoreDTO $conceitoAvaliacaoStoreDTO): ConceitoAvaliacao
    {   
        return $this->model->create((array)$conceitoAvaliacaoStoreDTO);
    }

    public function find(string $uuid): ConceitoAvaliacao
    {
        return $this->model
            ->with('itensConceitosAvaliacao')
            ->where('uuid', $uuid)->first();
    }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query()->with('itensConceitosAvaliacao');

        if(!is_null($filter)) {
            $query->where("descricao", "like", "%".$filter."%");
        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function update(ConceitoAvaliacaoUpdateDTO $dto): ConceitoAvaliacao
    {
        $this->model->where("uuid", $dto->uuid)->update([
            'uuid' => $dto->uuid,
            'descricao' => $dto->descricao
        ]);
        
        return $this->find($dto->uuid);
    }
    
    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function totalPontosPorItensUuid(array $itensUuid) : float
    {
        $itens = collect($itensUuid)->map(function ($uuid) {
            return ItemConceitoAvaliacao::where('uuid', $uuid)->value('pontuacao');
        })->toArray();
        
        return array_sum($itens);
    }
}
