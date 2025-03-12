<?php

namespace App\Observers;

use App\Models\CalculoPontuacaoCiclo;
use Illuminate\Support\Str;

class CalculoPontuacaoCicloObserver
{
    /**
     * Handle the CalculoPontuacaoCiclo "created" event.
     */
    public function creating(CalculoPontuacaoCiclo $calculoPontuacaoCiclo): void
    {
        $calculoPontuacaoCiclo->uuid = Str::uuid();
    }
}
