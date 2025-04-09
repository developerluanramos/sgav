<?php

namespace App\Observers;

use App\Models\RegraPontuacaoCiclo;
use Illuminate\Support\Str;

class RegraPontuacaoCicloObserver
{
    /**
     * Handle the CalculoPontuacaoCiclo "created" event.
     */
    public function creating(RegraPontuacaoCiclo $regraPontuacaoCiclo): void
    {
        $regraPontuacaoCiclo->uuid = Str::uuid();
    }
}
