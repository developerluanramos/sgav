<?php

namespace App\Actions\CicloAvaliativoPeriodicidade;

use App\DTO\CicloAvaliativoPeriodicidade\PeriodicidadeStoreDTO;
use App\Enums\CicloAvaliativoStepsEnum;
use App\Models\Periodicidade;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\CicloAvaliativoPeriodicidade\PeriodicidadeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PeriodicidadeStoreAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
        protected PeriodicidadeRepositoryInterface $periodicidadeRepository
    ) { }

    public function exec(PeriodicidadeStoreDTO $dto) : Periodicidade
    {
        DB::beginTransaction();

        $cicloAvaliativo = $this->cicloAvaliativoRepository->new([
            'step' => CicloAvaliativoStepsEnum::INCIDENCIA
        ]);

        $periodicidade = $this->periodicidadeRepository->new($cicloAvaliativo->uuid, $dto);

        DB::commit();

        return $periodicidade;
    }
}
