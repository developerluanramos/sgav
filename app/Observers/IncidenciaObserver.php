<?php

namespace App\Observers;

use App\Models\CicloAvaliativoIncidencia;
use Illuminate\Support\Str;

class IncidenciaObserver
{
    public function creating(CicloAvaliativoIncidencia $incidencia): void
    {
        $incidencia->uuid = Str::uuid();
    }
}
