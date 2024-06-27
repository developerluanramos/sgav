<?php

namespace App\Repositories\CicloAvaliativoPeriodicidade;

use App\DTO\CicloAvaliativoPeriodicidade\PeriodicidadeStoreDTO;
use App\Models\Periodicidade;

class PeriodicidadeEloquentRepository implements PeriodicidadeRepositoryInterface
{
    protected $model;

    public function __construct(Periodicidade $model)
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

    public function find(string $uuid): Periodicidade
    {
        return $this->model
            ->where('uuid', $uuid)->first();
    }

    public function new(string $cicloAvaliativoUuid, PeriodicidadeStoreDTO $dto): Periodicidade
    {
        $data = (array) $dto;
        $data['ciclos_avaliativos_uuid'] = $cicloAvaliativoUuid;

        return $this->model->create($data);
    }
}
