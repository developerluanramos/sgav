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
        // dd($dto);
        DB::beginTransaction();

        $cicloAvaliativo = $this->cicloAvaliativoRepository->new($dto);

        DB::commit();

        return $cicloAvaliativo ;
    }
}
