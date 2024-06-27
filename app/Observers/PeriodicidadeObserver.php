<?php

namespace App\Observers;

use App\Models\Periodicidade;
use Illuminate\Support\Str;

class PeriodicidadeObserver
{
    public function creating(Periodicidade $periodicidade): void
    {
        $periodicidade->uuid = Str::uuid();
    }
}
