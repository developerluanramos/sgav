<?php

namespace App\Actions\VinculoAvaliacao;

use App\DTO\VinculoAvaliacao\VinculoAvaliacaoStoreDTO;
use App\Models\VinculoAvaliacao;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\Vinculo\VinculoRepositoryInterface;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;

class VinculoAvaliacaoStoreAction
{
    public function __construct(
        protected VinculoAvaliacaoRepositoryInterface $vinculoAvaliacaoRepository
    ) { }
    
    public function exec(VinculoAvaliacaoStoreDTO $dto): VinculoAvaliacao
    { 
        return $this->vinculoAvaliacaoRepository->new($dto);
    }
}
