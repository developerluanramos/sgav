<?php

namespace App\Observers;

use App\Models\Avaliacao;
use Illuminate\Support\Str;

class AvaliacaoObserver
{
    public function creating(Avaliacao $avaliacao): void
    {
        $avaliacao->uuid = Str::uuid();
    }
}
