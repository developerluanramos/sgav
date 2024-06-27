<?php

namespace App\Observers;

use App\Models\CicloAvaliativoModelo;
use Illuminate\Support\Str;

class CicloAvaliativoModeloObserver
{
    public function creating(CicloAvaliativoModelo $CicloAvaliativoModelo): void
    {
        $CicloAvaliativoModelo->uuid = Str::uuid();
    }
}
