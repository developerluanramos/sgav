<?php

namespace App\Observers;

use App\Models\CicloAvaliativo;
use Illuminate\Support\Str;

class CicloAvaliativoObserver
{
    public function creating(CicloAvaliativo $cicloAvaliativo): void
    {
        $cicloAvaliativo->uuid = Str::uuid();
    }
}
