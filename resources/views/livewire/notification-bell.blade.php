<div class="relative" x-data="{ open: false }">
    <!-- Sininho (Dark Mode Compatível) -->
    <button 
        @click="open = !open" 
        class="p-1 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 focus:outline-none transition-colors"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        @if($unreadCount > 0)
            <span id="notification-counter" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs dark:bg-red-600">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @endif
    </button>

    <!-- Dropdown (Dark Mode) -->
    <div 
        x-show="open" 
        @click.away="open = false"
        class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-md shadow-lg z-50 border dark:border-gray-700"
    >
        <!-- Cabeçalho -->
        <div class="p-2 border-b dark:border-gray-700">
            <span class="font-semibold text-gray-800 dark:text-gray-200">Notificações</span>
        </div>

        <!-- Lista de Notificações -->
        @forelse($notifications as $notification)
            <div 
                wire:click="markAsRead('{{ $notification->id }}')"
                class="p-3 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors"
            >
                <p class="text-sm text-gray-800 dark:text-gray-200">
                    {{ $notification->data['mensagem'] }}
                </p>
                <span class="text-xs text-gray-500 dark:text-gray-400">
                    {{ $notification->created_at->diffForHumans() }}
                </span>
            </div>
        @empty
            <div class="p-3 text-sm text-gray-500 dark:text-gray-400">
                Nenhuma notificação nova.
            </div>
        @endforelse

        <!-- Rodapé -->
        {{-- <div class="p-2 text-center border-t dark:border-gray-700">
            <a 
                href="{{ route('notifications.index') }}" 
                class="text-sm text-blue-500 dark:text-blue-400 hover:underline"
            >
                Ver todas
            </a>
        </div> --}}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const notificationCounter = document.getElementById('notification-counter');
    
    function checkNotifications() {
        fetch('/api/notifications/count') // Você precisará criar esta rota
            .then(response => response.json())
            .then(data => {
                if (data.count > 0) {
                    notificationCounter.textContent = data.count;
                    notificationCounter.classList.remove('hidden');
                    
                    // Adiciona animação de pulse
                    notificationCounter.classList.add('animate-pulse');
                    setTimeout(() => {
                        notificationCounter.classList.remove('animate-pulse');
                    }, 1000);
                } else {
                    notificationCounter.classList.add('hidden');
                }
            });
    }

    // Verifica a cada 1 minuto (60000ms)
    setInterval(checkNotifications, 1000);
    
    // Verifica imediatamente ao carregar
    checkNotifications();
});
</script>