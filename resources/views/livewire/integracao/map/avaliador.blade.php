<div>
    <div>
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Avaliadores</h5>
            </a>
            
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                status: <x-layouts.badges.status-integracao
                    :status="$statusIntegracao">
                </x-layouts.badges.status-integracao>
            </p>

            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{$vinculosCriados}} criados / {{$vinculosAtualizados}} atualizados
            </p>
            
            <button type="button" wire:loading.attr="disabled" wire:click="sincronizar()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Sincronizar
                <svg class="w-4 h-4 text-gray-800 dark:text-white ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
                </svg>              
            </button>
            {{-- <br><br> --}}
            {{-- <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{$percentProgressBar}}%"> {{$percentProgressBar}}%</div>
            </div>
            <br>
            <progress class="w-full" max="100" value="{{$percentProgressBar}}" id="progressBar"></progress> --}}
            <span wire:loading wire:target="sincronizar">sincronizando...</span>
        </div>
    </div>
</div>
