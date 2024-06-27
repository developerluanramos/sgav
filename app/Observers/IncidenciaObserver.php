<?php

namespace App\Observers;

use App\Models\Incidencia;
use Illuminate\Support\Str;

class IncidenciaObserver
{
    public function creating(Incidencia $incidencia): void
    {
        $incidencia->uuid = Str::uuid();
    }
}
