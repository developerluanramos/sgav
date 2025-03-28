<?php

namespace App\Livewire\Integracao\Map;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Avaliador extends Component
{
    public $baseUrl = "";
    public $vinculos = [];
    public $statusIntegracao;

    public $percentProgressBar = 0;

    public $vinculosCriados = 0;
    public $vinculosAtualizados = 0;

    protected $listeners = ['alteraPercentProgressBar' => 'update-percent'];

    public function mount()
    {
        $this->baseUrl = env('URL_INTEGRACAO');
        $this->statusIntegracao = Http::get($this->baseUrl.'/health')->status();
    }

    public function getVinculos()
    {
        $vinculos = Http::get($this->baseUrl.'/madp/servidor_vinculo/')->body();
        $this->vinculos = json_decode($vinculos)->data;
    }

    public function render()
    {
        return view('livewire.integracao.map.avaliador');
    }

    public function getProgressInformation()
    {
        $this->percentProgressBar++;
    }

    public function sincronizar()
    {
        // set_time_limit(1000);

        // $this->getVinculos();
        
        // DB::beginTransaction();

        // foreach($this->vinculos as $index => $servidor) {
        //     foreach($servidor->vinculos as $vinculo) {
                
        //         $modelVinculo = ModelsVinculo::firstOrNew(
        //             (VinculoStoreDTO::makeFromImportacao($vinculo))
        //         );
                
        //         $this->vinculosAtualizados++;
        //         if(is_null($modelVinculo->id)) {
        //             $this->vinculosAtualizados--;
        //             $this->vinculosCriados++;
        //         }
                
        //         $modelVinculo->save();
        //     }
        // }

        // DB::commit();
    }
}
