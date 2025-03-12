<?php

namespace App\Livewire\App\Ciclo;

use Livewire\Component;

class RegrasPontuacao extends Component
{
    public $regrasPontuacao = [];

    public function mount()
    {
        $this->regrasPontuacao = [
            [
                'de' => '', 
                'ate' => '', 
                'status_vinculo_ciclo' => '', 
                'status_ciclo' => ''
            ]
        ];
    }

    public function addRegraPontuacao()
    {
        $this->regrasPontuacao[] = ['de' => '', 'ate' => '', 'status_vinculo_ciclo' => '', 'status_ciclo' => ''];
    }

    public function removeRegraPontuacao($index)
    {
        unset($this->regrasPontuacao[$index]);
        $this->regrasPontuacao = array_values($this->regrasPontuacao);
    }

    public function render()
    {
        return view('livewire.app.ciclo.regras-pontuacao');
    }
}
