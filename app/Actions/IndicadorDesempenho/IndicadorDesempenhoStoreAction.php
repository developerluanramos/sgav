<?php

namespace App\Actions\IndicadorDesempenho;

use App\DTO\IndicadorDesempenho\IndicadorDesempenhoStoreDTO;
use App\Repositories\IndicadorDesempenho\IndicadorDesempenhoRepositoryInterface;

class IndicadorDesempenhoStoreAction
{
    public function __construct(
        protected IndicadorDesempenhoRepositoryInterface $indicadorDesempenhoRepository,
    ) { }

    public function exec(IndicadorDesempenhoStoreDTO $dto): array
    {
        $indicadorDesempenho = $this->indicadorDesempenhoRepository->new($dto);

        return [
            "indicadorDesempenho" => $indicadorDesempenho,
        ];
    }
}
