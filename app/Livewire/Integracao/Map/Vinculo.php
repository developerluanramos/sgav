<?php

namespace App\Livewire\Integracao\Map;

use App\DTO\Vinculo\VinculoStoreDTO;
use App\Models\Vinculo as ModelVinculo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Livewire;

class Vinculo extends Component
{
    public $vinculos = [];
    public $statusIntegracao;

    public $percentProgressBar = 0;

    public $vinculosCriados = 0;
    public $vinculosAtualizados = 0;

    protected $listeners = ['alteraPercentProgressBar' => 'update-percent'];

    public function mount()
    {
        // $this->qtdVinculosAtual = ModelVinculo::all()->count();
        // $this->getVinculos();
        $this->statusIntegracao = Http::get('http://192.168.1.68:6818/rest/health')->status();
    }

    public function getVinculos()
    {
        $vinculos = Http::get('http://192.168.1.68:6818/rest/madp/servidor_vinculo/')->body();
        $this->vinculos = json_decode($vinculos)->data;
    }

    public function render()
    {
        return view('livewire.integracao.map.vinculo');
    }

    public function getProgressInformation()
    {
        $this->percentProgressBar++;
    }

    public function sincronizar()
    {
        set_time_limit(1000);

        $this->getVinculos();
        
        DB::beginTransaction();

        foreach($this->vinculos as $index => $servidor) {
            foreach($servidor->vinculos as $vinculo) {
                $vinculo->nome = $servidor->nome;
                $modelVinculo = ModelVinculo::firstOrNew(
                    (VinculoStoreDTO::makeFromImportacao($vinculo))
                );
                
                $this->vinculosAtualizados++;
                if(is_null($modelVinculo->id)) {
                    $this->vinculosAtualizados--;
                    $this->vinculosCriados++;
                }
                
                $modelVinculo->save();
            }
        }

        DB::commit();
    }
}
