<?php

namespace App\Observers;

use App\Models\RegraPontuacaoPeriodo;
use Illuminate\Support\Str;

class RegraPontuacaoPeriodoObserver
{
    public function creating(RegraPontuacaoPeriodo $registro)
    {
        $registro->uuid = Str::uuid();
    }
}
