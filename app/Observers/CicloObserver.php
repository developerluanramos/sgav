<?php

namespace App\Observers;

use App\Models\Ciclo;
use Illuminate\Support\Str;

class CicloObserver
{
    public function creating(Ciclo $avaliacao): void
    {
        $avaliacao->uuid = Str::uuid();
    }
}
