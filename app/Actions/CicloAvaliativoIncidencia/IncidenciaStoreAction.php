<?php

namespace App\Actions\CicloAvaliativoIncidencia;

use App\DTO\CicloAvaliativoIncidencia\IncidenciaStoreDTO;
use App\Enums\CicloAvaliativoStepsEnum;
use App\Models\Incidencia;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\CicloAvaliativoIncidencia\IncidenciaRepositoryInterface;
use Illuminate\Support\Facades\DB;

class IncidenciaStoreAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
        protected IncidenciaRepositoryInterface $IncidenciaRepository
    ) { }

    public function exec(IncidenciaStoreDTO $dto) : Incidencia
    {
        DB::beginTransaction();

        $cicloAvaliativo = $this->cicloAvaliativoRepository->update($dto->ciclos_avaliativos_uuid, [
            'step' => CicloAvaliativoStepsEnum::TEMPLATE
        ]);

        $incidencia = $this->IncidenciaRepository->new($cicloAvaliativo->uuid, $dto);

        DB::commit();

        return $incidencia;
    }
}
