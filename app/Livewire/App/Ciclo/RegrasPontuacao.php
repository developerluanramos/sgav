<?php

namespace App\Livewire\App\Ciclo;

use Livewire\Component;

class RegrasPontuacao extends Component
{
    public $regrasPontuacao = [];
    public $regrasOcorrencias = [];

    public function mount()
    {
        $this->regrasPontuacao = [
            ['de' => '', 'ate' => '', 'statusVinculo' => '', 'statusCiclo' => '']
        ];

        $this->regrasOcorrencias = [
            ['min' => '', 'max' => '', 'tipo' => '', 'ocorrencia' => '', 'statusVinculo' => '', 'statusCiclo' => '', 'pontos' => '']
        ];
    }

    public function addRegraPontuacao()
    {
        $this->regrasPontuacao[] = ['de' => '', 'ate' => '', 'statusVinculo' => '', 'statusCiclo' => ''];
    }

    public function removeRegraPontuacao($index)
    {
        unset($this->regrasPontuacao[$index]);
        $this->regrasPontuacao = array_values($this->regrasPontuacao);
    }

    public function addRegraOcorrencia()
    {
        $this->regrasOcorrencias[] = ['min' => '', 'max' => '', 'tipo' => '', 'ocorrencia' => '', 'statusVinculo' => '', 'statusCiclo' => '', 'pontos' => ''];
    }

    public function removeRegraOcorrencia($index)
    {
        unset($this->regrasOcorrencias[$index]);
        $this->regrasOcorrencias = array_values($this->regrasOcorrencias);
    }
    
    public function render()
    {
        return view('livewire.app.ciclo.regras-pontuacao');
    }
}
