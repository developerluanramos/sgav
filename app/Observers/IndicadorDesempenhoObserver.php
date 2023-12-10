<?php

namespace App\Observers;

use App\Models\IndicadorDesempenho;
use Illuminate\Support\Str;

class IndicadorDesempenhoObserver
{
    /**
     * Handle the Fator "created" event.
     */
    public function creating(IndicadorDesempenho $indicadorDesempenho): void
    {
        $indicadorDesempenho->uuid = Str::uuid();
    }
}
