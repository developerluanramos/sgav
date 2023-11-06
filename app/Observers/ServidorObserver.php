<?php

namespace App\Observers;

use App\Models\Servidor;
use Illuminate\Support\Str;

class ServidorObserver
{
    /**
     * Handle the Servidor "created" event.
     */
    public function creating(Servidor $servidor): void
    {
        $servidor->uuid = Str::uuid();
    }

    /**
     * Handle the Servidor "created" event.
     */
    public function created(Servidor $servidor): void
    {
        //
    }

    /**
     * Handle the Servidor "updated" event.
     */
    public function updated(Servidor $servidor): void
    {
        //
    }

    /**
     * Handle the Servidor "deleted" event.
     */
    public function deleted(Servidor $servidor): void
    {
        //
    }

    /**
     * Handle the Servidor "restored" event.
     */
    public function restored(Servidor $servidor): void
    {
        //
    }

    /**
     * Handle the Servidor "force deleted" event.
     */
    public function forceDeleted(Servidor $servidor): void
    {
        //
    }
}
