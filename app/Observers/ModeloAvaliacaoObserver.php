<?php

namespace App\Observers;

use App\Models\ModeloAvaliacao;
use Illuminate\Support\Str;

class ModeloAvaliacaoObserver
{
    /**
     * Handle the Modelo "created" event.
     */
    public function creating(ModeloAvaliacao $modeloAvaliacao): void
    {
        $modeloAvaliacao->uuid = Str::uuid();
    }

    /**
     * Handle the Modelo "created" event.
     */
    public function created(ModeloAvaliacao $modeloAvaliacao): void
    {
        //
    }

    /**
     * Handle the Modelo "updated" event.
     */
    public function updated(ModeloAvaliacao $modeloAvaliacao): void
    {
        //
    }

    /**
     * Handle the Modelo "deleted" event.
     */
    public function deleted(ModeloAvaliacao $modeloAvaliacao): void
    {
        //
    }

    /**
     * Handle the Modelo "restored" event.
     */
    public function restored(ModeloAvaliacao $modeloAvaliacao): void
    {
        //
    }

    /**
     * Handle the Modelo "force deleted" event.
     */
    public function forceDeleted(ModeloAvaliacao $modeloAvaliacao): void
    {
        //
    }
}
