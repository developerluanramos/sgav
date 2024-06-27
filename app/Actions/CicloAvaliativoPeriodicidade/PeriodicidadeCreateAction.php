<?php

namespace App\Actions\CicloAvaliativoPeriodicidade;

use App\Enums\UnidadePeriodicidadeEnum;

class PeriodicidadeCreateAction
{
    public function exec()
    {
        return [
            "unidadesPeriodicidade" => UnidadePeriodicidadeEnum::asArray()
        ];
    }
}
