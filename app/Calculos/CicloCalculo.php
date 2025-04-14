<?php

namespace App\Calculos;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Models\RegraPontuacaoCiclo;
use App\Models\VinculoAvaliacao;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\RegraPontuacaoCiclo\RegraPontuacaoCicloRepositoryInterface;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class CicloCalculo
{
    public function __construct(
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
        protected RegraPontuacaoCicloRepositoryInterface $regraPontuacaoCicloRepository,
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository
    ){}

    public function exec(VinculoAvaliacaoStoreDTO $vinculoAvaliacaoStoreDTO) : void
    {
        // -- é a última avaliação do ciclo? TODO
        if (false === true)
        {
            $totalPontosPeriodo = $this->vinculoAvaliacaoRepository->totalPontosPorCicloEVinculoUuid(
                $vinculoAvaliacaoStoreDTO->ciclos_uuid,
                $vinculoAvaliacaoStoreDTO->vinculos_uuid
            ); // TODO

            $regraPontuacao = $this->regraPontuacaoCicloRepository->porCicloAvaliativoETotalPontos(
                $vinculoAvaliacaoStoreDTO->ciclos_avaliativos_uuid, $totalPontosPeriodo
            );

            $vinculoAvaliacaoStoreDTO->status_vinculo_ciclo = $regraPontuacao->status_vinculo_ciclo;
            $vinculoAvaliacaoStoreDTO->status_ciclo = $regraPontuacao->status_ciclo;
        }

        $this->vinculoAvaliacaoRepository->update($vinculoAvaliacaoStoreDTO); // TODO
    }
}
