<?php

namespace App\Observers;

use App\Models\Vinculo;
use Illuminate\Support\Str;

class VinculoObserver
{
    /**
     * Handle the Vinculo "created" event.
     */
    public function creating(Vinculo $vinculo): void
    {
        $vinculo->uuid = Str::uuid();
    }
}
