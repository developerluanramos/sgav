<?php

namespace App\Observers;

use App\Models\FatorAvaliacao;
use Illuminate\Support\Str;

class FatorAvaliacaoObserver
{
    /**
     * Handle the Fator "created" event.
     */
    public function creating(FatorAvaliacao $fatorAvaliacao): void
    {
        $fatorAvaliacao->uuid = Str::uuid();
    }
}
