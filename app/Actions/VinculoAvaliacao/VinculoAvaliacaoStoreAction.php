<?php

namespace App\Actions\VinculoAvaliacao;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Enums\StatusCicloEnum;
use App\Enums\StatusVinculoCicloEnum;
use App\Models\CalculoPontuacaoCiclo;
use App\Models\VinculoAvaliacao;
use App\Repositories\CalculoPontuacaoCiclo\CalculoPontuacaoCicloRepositoryInterface;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class VinculoAvaliacaoStoreAction
{
    public function __construct(
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository,
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
        protected CalculoPontuacaoCicloRepositoryInterface $calculoPontuacaoCicloRepository
    ) { }
    
    public function exec(VinculoAvaliacaoStoreDTO $dto): VinculoAvaliacao
    { 
        $totalPontos = $this->conceitoAvaliacaoRepository
                            ->totalPontosPorItensUuid(
                                array_merge(...array_values($dto->conceitos_uuid))
                            );
        $regraCalculoPontuacao = $this->calculoPontuacaoCicloRepository
                            ->porCicloAvaliativoETotalPontos(
                                $dto->ciclos_avaliativos_uuid, 
                                $totalPontos
                            );
        
        // dd($regraCalculoPontuacao);
        $dto->status_avaliacao = (int)$regraCalculoPontuacao->status_ciclo;
        $dto->status_vinculo_avaliacao = (int)$regraCalculoPontuacao->status_vinculo_ciclo;
        // dd($dto);                    
        return $this->vinculoAvaliacaoRepository->new($dto);
    }
}
