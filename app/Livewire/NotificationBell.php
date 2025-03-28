<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationBell extends Component
{
    public $unreadCount;

    protected $listeners = ['refreshNotifications' => 'updateUnreadCount']; // Adicione esta linha

    public function mount()
    {
        $this->updateUnreadCount();
        $this->unreadCount = Auth::user()->unreadNotifications->count();
    }

    public function updateUnreadCount()
    {
        $this->unreadCount = Auth::user()->unreadNotifications->count();
    }

    public function markAsRead($id)
    {
        Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
        $this->unreadCount = Auth::user()->unreadNotifications->count();
    }

    public function render()
    {
        return view('livewire.notification-bell', [
            'notifications' => Auth::user()->unreadNotifications->take(5)
        ]);
    }
}
