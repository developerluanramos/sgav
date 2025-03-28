<?php

namespace App\Livewire\Integracao\Map;

use App\DTO\Vinculo\VinculoStoreDTO;
use App\Jobs\SincronizarVinculosJob;
use App\Livewire\NotificationBell;
use App\Models\User;
use App\Models\Vinculo as ModelVinculo;
use App\Notifications\SincronizacaoIniciadaNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Livewire;

class Vinculo extends Component
{
    public $baseUrl = "";
    public $statusIntegracao;
    public $progresso = 0;

    public function mount()
    {
        $this->baseUrl = env('URL_INTEGRACAO');
        $this->statusIntegracao = Http::get($this->baseUrl.'/health')->status();
    }

    public function render()
    {
        return view('livewire.integracao.map.vinculo');
    }

    public function sincronizar()
    {
        $user = auth()->user();
        
        $user->notify(new SincronizacaoIniciadaNotification());
        
        // $this->dispatch('refreshNotifications')->to(NotificationBell::class);

        SincronizarVinculosJob::dispatch($user->id)->onQueue('default');

        redirect()->to('/integracao');
    }
}
