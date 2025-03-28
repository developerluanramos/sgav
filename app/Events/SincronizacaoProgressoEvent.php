<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SincronizacaoProgressoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $progresso;

    public function __construct($progresso)
    {
        $this->progresso = $progresso;
    }

    public function broadcastOn()
    {
        return cache()->put('progresso_sincronizacao', $this->progresso);
    }
}
