<?php

namespace App\Actions\CicloAvaliativo;

use App\DTO\CicloAvaliativo\CicloAvaliativoStoreDTO;
use App\Models\CicloAvaliativo;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CicloAvaliativoStoreAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
    ) { }

    public function exec(CicloAvaliativoStoreDTO $dto) : CicloAvaliativo
    {
        DB::beginTransaction();

        $cicloAvaliativo = $this->cicloAvaliativoRepository->new($dto);

        foreach($dto->ciclos as $ciclo) {
            $createdCiclo = $cicloAvaliativo->ciclos()->create($ciclo);
            // dd($ciclo);
            foreach($ciclo['periodos'] as $periodo) {
                $periodo['ciclos_avaliativos_uuid'] = $cicloAvaliativo->uuid;
                $createdPeriodo = $createdCiclo->periodos()->create($periodo);

                foreach($periodo['avaliacoes'] as $avaliacao) {
                    $avaliacao['ciclos_avaliativos_uuid'] = $cicloAvaliativo->uuid;
                    $avaliacao['ciclos_uuid'] = $createdCiclo->uuid;
                    
                    $avaliacao = $createdPeriodo->avaliacoes()->create($avaliacao);
                }
            }
        }

        DB::commit();

        return $cicloAvaliativo ;
    }
}
