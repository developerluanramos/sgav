<?php

namespace App\Observers;

use App\Models\Periodo;
use Illuminate\Support\Str;

class PeriodoObserver
{
    public function creating(Periodo $avaliacao): void
    {
        $avaliacao->uuid = Str::uuid();
    }
}
