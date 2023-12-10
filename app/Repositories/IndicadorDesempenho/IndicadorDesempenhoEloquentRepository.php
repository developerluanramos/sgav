<?php

namespace App\Repositories\IndicadorDesempenho;

use App\DTO\IndicadorDesempenho\IndicadorDesempenhoStoreDTO;
use App\Models\IndicadorDesempenho;


class IndicadorDesempenhoEloquentRepository implements IndicadorDesempenhoRepositoryInterface
{
    public function __construct(
        protected IndicadorDesempenho $model
    ){}

    public function new(IndicadorDesempenhoStoreDTO $indicadorDesempenhoStoreDTO): IndicadorDesempenho
    {
        return $this->model->create((array)$indicadorDesempenhoStoreDTO);
    }
}
