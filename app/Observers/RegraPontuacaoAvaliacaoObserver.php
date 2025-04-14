<?php

namespace App\Observers;

use App\Models\RegraPontuacaoAvaliacao;
use Illuminate\Support\Str;

class RegraPontuacaoAvaliacaoObserver
{
    public function creating(RegraPontuacaoAvaliacao $registro)
    {
        $registro->uuid = Str::uuid();
    }
}
