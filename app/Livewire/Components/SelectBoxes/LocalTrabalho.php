<?php

namespace App\Livewire\Components\SelectBoxes;

use App\Models\Vinculo;
use Livewire\Component;

class LocalTrabalho extends Component
{
    public array $locaisTrabalho;
    public $dataSearch;
    public $stringSearch;

    public function mount(
        array $locaisTrabalho = []
    )
    {
        $this->locaisTrabalho = $locaisTrabalho;
        $this->dataSearch = [];
        $this->stringSearch = "";
    }

    public function render()
    {
        return view('livewire.components.select-boxes.local-trabalho');
    }

    public function updatedStringSearch()
    {
        $this->dataSearch = Vinculo::select("codigo_local_trabalho", "nome_local_trabalho")
            ->where("codigo_local_trabalho", 'like', '%'.$this->stringSearch.'%')
            ->orWhere("nome_local_trabalho", 'like', '%'.$this->stringSearch.'%')
            ->distinct("codigo_local_trabalho")->get()->toArray();
    }

    public function add(int $index)
    {
        $this->locaisTrabalho[] = $this->dataSearch[$index];
        unset($this->dataSearch[$index]);
    }

    public function remove(int $index)
    {
        unset($this->locaisTrabalho[$index]);
    }
}
