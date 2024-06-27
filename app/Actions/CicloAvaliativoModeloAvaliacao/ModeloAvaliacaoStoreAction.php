<?php

namespace App\Actions\CicloAvaliativoModeloAvaliacao;

use App\DTO\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreDTO;
use App\Enums\CicloAvaliativoStepsEnum;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\CicloAvaliativoModeloAvaliacao\CicloAvaliativoModeloRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ModeloAvaliacaoStoreAction
{
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $cicloAvaliativoRepository,
        protected CicloAvaliativoModeloRepositoryInterface $cicloAvaliativoModeloRepository
    ) { }

    public function exec(ModeloAvaliacaoStoreDTO $dto): void
    {
        DB::beginTransaction();

        $this->cicloAvaliativoRepository->update($dto->ciclosAvaliativosUuid, [
            'step' => CicloAvaliativoStepsEnum::CONCLUSAO
        ]);

        $this->cicloAvaliativoModeloRepository->newVarious($dto->ciclosAvaliativosUuid, $dto->modelosAvaliacaoUuid);

        DB::commit();
    }
}
