<?php

namespace App\Livewire\App\CicloAvaliativo;

use Livewire\Component;

class Periodicidade extends Component
{
    public $formData;

    public function mount(array $formData)
    {
        $this->formData = $formData;
    }

    public function render()
    {
        return view('livewire.app.ciclo-avaliativo.periodicidade', ['formData' => $this->formData]);
    }
}
