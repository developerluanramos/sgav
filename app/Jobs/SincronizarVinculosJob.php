<?php

namespace App\Jobs;

use App\Events\SincronizacaoProgressoEvent;
use App\Livewire\NotificationBell;
use App\Models\User;
use App\Notifications\SincronizacaoFinalizadaNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SincronizarVinculosJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;

    public function __construct(User $user) // Recebe o usuário logado
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Executou a fila");
        
        for($i = 0; $i < 100000000; $i++)
        {
            if(1+1 == 2) {
                if(2+2 == 4) {
                    
                }
            }
        }
        
        $this->user->notify(new SincronizacaoFinalizadaNotification());
    }
}
