<?php

namespace App\Actions\CicloAvaliativoIncidencia;

use App\DTO\CicloAvaliativoIncidencia\IncidenciaStoreDTO;
use App\Models\CicloAvaliativoIncidencia;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\CicloAvaliativoIncidencia\IncidenciaRepositoryInterface;
use Illuminate\Support\Facades\DB;

class IncidenciaStoreAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
        protected IncidenciaRepositoryInterface $IncidenciaRepository
    ) { }

    public function exec(IncidenciaStoreDTO $dto) : CicloAvaliativoIncidencia
    {
        DB::beginTransaction();
        
        $incidencia = $this->IncidenciaRepository->new($dto->ciclos_avaliativos_uuid, $dto);

        DB::commit();

        return $incidencia;
    }
}
