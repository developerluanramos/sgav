<?php

namespace App\Livewire\Components\SelectBoxes;

use App\Models\Vinculo;
use Livewire\Component;

class Orgao extends Component
{
    public array $orgaos;
    public $dataSearch;
    public $stringSearch;

    public function mount(
        array $orgaos = []
    )
    {
        $this->orgaos = $orgaos;
        $this->dataSearch = [];
        $this->stringSearch = "";
    }

    public function render()
    {
        return view('livewire.components.select-boxes.orgao');
    }

    public function updatedStringSearch()
    {
        $this->dataSearch = Vinculo::select("codigo_orgao", "nome_orgao")
            ->where("codigo_orgao", 'like', '%'.$this->stringSearch.'%')
            ->orWhere("nome_orgao", 'like', '%'.$this->stringSearch.'%')
            ->distinct("codigo_orgao")->get()->toArray();
    }

    public function add(int $index)
    {
        $this->orgaos[] = $this->dataSearch[$index];
        unset($this->dataSearch[$index]);
    }

    public function remove(int $index)
    {
        unset($this->orgaos[$index]);
    }
}
