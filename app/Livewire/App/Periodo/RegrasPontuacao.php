<?php

namespace App\Livewire\App\Periodo;

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
                'status_ciclo' => '',
                'status_vinculo_periodo' => '',
                'status_periodo' => '',
                'aplicar_todos' => false
            ]
        ];
    }

    public function addRegraPontuacao()
    {
        $this->regrasPontuacao[] = [
            'de' => '',
            'ate' => '',
            'status_vinculo_ciclo' => '',
            'status_ciclo' => '',
            'status_vinculo_periodo' => '',
            'status_periodo' => '',
            'aplicar_todos' => false
        ];
    }

    public function removeRegraPontuacao($index)
    {
        unset($this->regrasPontuacao[$index]);
        $this->regrasPontuacao = array_values($this->regrasPontuacao);
    }

    public function render()
    {
        return view('livewire.app.periodo.regras-pontuacao');
    }
}
