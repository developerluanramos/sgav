<?php

namespace App\Actions\VinculoAvaliacao;

use App\Calculos\AvaliacaoCalculo;
use App\Calculos\CicloCalculo;
use App\Calculos\PeriodoCalculo;
use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Enums\StatusCicloEnum;
use App\Enums\StatusVinculoCicloEnum;
use App\Models\CalculoPontuacaoCiclo;
use App\Models\VinculoAvaliacao;
use App\Repositories\RegraPontuacaoCiclo\RegraPontuacaoCicloRepositoryInterface;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class VinculoAvaliacaoStoreAction
{
    public function __construct(
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository,
        protected ConceitoAvaliacaoRepositoryInterface $conceitoAvaliacaoRepository,
        protected RegraPontuacaoCicloRepositoryInterface $calculoPontuacaoCicloRepository
    ) { }

    public function exec(VinculoAvaliacaoStoreDTO $dto): VinculoAvaliacao
    {
        (new AvaliacaoCalculo())->exec();

        (new PeriodoCalculo())->exec();

        (new CicloCalculo())->exec();

        $totalPontos = $this->conceitoAvaliacaoRepository->totalPontosPorItensUuid(
            array_merge(...array_values($dto->conceitos_uuid))
        );
        dd($totalPontos);
        $regraCalculoPontuacaoCiclo = $this->calculoPontuacaoCicloRepository->porCicloAvaliativoETotalPontos(
            $dto->ciclos_avaliativos_uuid, $totalPontos
        );
        $dto->status_avaliacao = $regraCalculoPontuacaoCiclo->status_ciclo;
        $dto->status_vinculo_avaliacao = $regraCalculoPontuacaoCiclo->status_vinculo_ciclo;

        return $this->vinculoAvaliacaoRepository->new($dto);
    }
}
