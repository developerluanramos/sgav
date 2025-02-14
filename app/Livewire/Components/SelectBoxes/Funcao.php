<?php

namespace App\Livewire\Components\SelectBoxes;

use App\Models\Vinculo;
use Livewire\Component;

class Funcao extends Component
{
    public array $funcoes;
    public $dataSearch;
    public $stringSearch;

    public function mount(
        array $funcoes = []
    )
    {
        $this->funcoes = $funcoes;
        $this->dataSearch = [];
        $this->stringSearch = "";
    }

    public function render()
    {
        return view('livewire.components.select-boxes.funcao');
    }

    public function updatedStringSearch()
    {
        $this->dataSearch = Vinculo::select("codigo_funcao", "nome_funcao")
            ->where("codigo_funcao", 'like', '%'.$this->stringSearch.'%')
            ->orWhere("nome_funcao", 'like', '%'.$this->stringSearch.'%')
            ->distinct("codigo_funcao")->get()->toArray();
    }

    public function add(int $index)
    {
        $this->funcoes[] = $this->dataSearch[$index];
        unset($this->dataSearch[$index]);
    }

    public function remove(int $index)
    {
        unset($this->funcoes[$index]);
    }
}
