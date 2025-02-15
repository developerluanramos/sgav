<?php

namespace App\Observers;

use App\Models\VinculoAvaliacao;
use Illuminate\Support\Str;

class VinculoAvaliacaoObserver
{
    /**
     * Handle the VinculoAvaliacao "created" event.
     */
    public function created(VinculoAvaliacao $vinculoAvaliacao): void
    {
        $vinculoAvaliacao->uuid = Str::uuid();
    }

    /**
     * Handle the VinculoAvaliacao "updated" event.
     */
    public function updated(VinculoAvaliacao $vinculoAvaliacao): void
    {
        //
    }

    /**
     * Handle the VinculoAvaliacao "deleted" event.
     */
    public function deleted(VinculoAvaliacao $vinculoAvaliacao): void
    {
        //
    }

    /**
     * Handle the VinculoAvaliacao "restored" event.
     */
    public function restored(VinculoAvaliacao $vinculoAvaliacao): void
    {
        //
    }

    /**
     * Handle the VinculoAvaliacao "force deleted" event.
     */
    public function forceDeleted(VinculoAvaliacao $vinculoAvaliacao): void
    {
        //
    }
}
