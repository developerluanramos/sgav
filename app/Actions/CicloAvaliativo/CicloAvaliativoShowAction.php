<?php

namespace App\Actions\CicloAvaliativo;

use App\DTO\CicloAvaliativo\CicloAvaliativoShowDTO;
use App\Models\CicloAvaliativo;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;

class CicloAvaliativoShowAction {
    public function __construct(
        protected CicloAvaliativoRepositoryInterface $repository
    ) { }

    public function exec(CicloAvaliativoShowDTO $dto): array 
    {
        return [ 
            "cicloAvaliativo" => $this->repository->show($dto->uuid),
            "avaliados" => $this->repository->avaliados($dto->uuid)
        ];
    }
}