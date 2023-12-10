<?php

namespace App\Observers;

use App\Models\ItemConceitoAvaliacao;
use Illuminate\Support\Str;

class ItemConceitoAvaliacaoObserver
{
    /**
     * Handle the Conceito "created" event.
     */
    public function creating(ItemConceitoAvaliacao $itemConceitoAvaliacao): void
    {
        $itemConceitoAvaliacao->uuid = Str::uuid();
    }

}
