<?php

namespace App\Observers;

use App\Models\ConceitoAvaliacao;
use Illuminate\Support\Str;

class ConceitoAvaliacaoObserver
{
    /**
     * Handle the Conceito "created" event.
     */
    public function creating(ConceitoAvaliacao $conceitoAvaliacao): void
    {
        $conceitoAvaliacao->uuid = Str::uuid();
    }

    /**
     * Handle the Conceito "created" event.
     */
    public function created(ConceitoAvaliacao $conceitoAvaliacao): void
    {
        //
    }

    /**
     * Handle the Conceito "updated" event.
     */
    public function updated(ConceitoAvaliacao $conceitoAvaliacao): void
    {
        //
    }

    /**
     * Handle the Conceito "deleted" event.
     */
    public function deleted(ConceitoAvaliacao $conceitoAvaliacao): void
    {
        //
    }

    /**
     * Handle the Conceito "restored" event.
     */
    public function restored(ConceitoAvaliacao $conceitoAvaliacao): void
    {
        //
    }

    /**
     * Handle the Conceito "force deleted" event.
     */
    public function forceDeleted(ConceitoAvaliacao $conceitoAvaliacao): void
    {
        //
    }
}
