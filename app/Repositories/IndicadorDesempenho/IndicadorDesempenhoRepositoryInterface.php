<?php

namespace App\Repositories\IndicadorDesempenho;

use App\DTO\IndicadorDesempenho\IndicadorDesempenhoStoreDTO;
use App\Models\IndicadorDesempenho;

interface IndicadorDesempenhoRepositoryInterface
{
    public function new(IndicadorDesempenhoStoreDTO $indicadorDesempenhoStoreDTO): IndicadorDesempenho;
}
