<?php

namespace App\Livewire\App\CicloAvaliativo;

use App\Enums\UnidadePeriodicidadeEnum;
use Carbon\Carbon;
use Exception;
use Livewire\Component;

class Create extends Component
{
    public $formData;
    public $iniciado_em;
    public $quantidade_ciclos;
    public $quantidade_unidade_ciclos;
    public $unidade_ciclos;
    public $quantidade_periodos;
    public $quantidade_unidade_periodos;
    public $unidade_periodos;
    public $ciclo_avaliativo;
    
    public function mount(array $formData)
    {
        $this->formData = $formData;
        $this->iniciado_em = Carbon::now()->toDateString();
        $this->quantidade_ciclos = 2;
        $this->quantidade_unidade_ciclos = 2;
        $this->unidade_ciclos = UnidadePeriodicidadeEnum::ANOS;
        $this->quantidade_periodos = 4;
        $this->quantidade_unidade_periodos = 6;
        $this->unidade_periodos = UnidadePeriodicidadeEnum::MESES;

        $this->montarCicloAvaliativo();
    }

    public function render()
    {
        return view('livewire.app.ciclo-avaliativo.create', ['formData' => $this->formData]);
    }

    public function montarCicloAvaliativo()
    {
        $this->ciclo_avaliativo = [];
        try {
            $iniciadoEm = Carbon::create($this->iniciado_em);
            $finalizadoEm = Carbon::create($this->iniciado_em)->addYears($this->quantidade_unidade_ciclos);
    
            $this->ciclo_avaliativo[] = [
                "iniciado_em" => $iniciadoEm->toDateString(),
                "finalizado_em" => $finalizadoEm->toDateString(),
                "periodos" => [
                    [
                        "iniciado_em" => Carbon::create($iniciadoEm),
                        "finalizado_em" => Carbon::create($iniciadoEm)->addMonths($this->quantidade_unidade_periodos),
                        "avaliacoes" => [[], []]
                    ]
                ]
            ];
    
            for ($i = 1; $this->quantidade_periodos > $i; $i++)
            {
                $this->ciclo_avaliativo[0]["periodos"][] = [
                    "iniciado_em" => Carbon::create($this->ciclo_avaliativo[0]["periodos"][$i-1]["iniciado_em"])->addMonths($this->quantidade_unidade_periodos),
                    "finalizado_em" => Carbon::create($this->ciclo_avaliativo[0]["periodos"][$i-1]["finalizado_em"])->addMonths($this->quantidade_unidade_periodos),
                    "avaliacoes" => [[], []]
                ];
            }
    
            for ($i = 1; $this->quantidade_ciclos > $i; $i++)
            {   
                $this->ciclo_avaliativo[] = [
                    "iniciado_em" => $iniciadoEm->addYears($this->quantidade_unidade_ciclos)->toDateString(),
                    "finalizado_em" => $finalizadoEm->addYears($this->quantidade_unidade_ciclos)->toDateString(),
                    "periodos" => [
                        [
                            "iniciado_em" => Carbon::create($this->ciclo_avaliativo[$i-1]["periodos"][$this->quantidade_periodos-1]["iniciado_em"])->addMonths($this->quantidade_unidade_periodos),
                            "finalizado_em" => Carbon::create($this->ciclo_avaliativo[$i-1]["periodos"][$this->quantidade_periodos-1]["finalizado_em"])->addMonths($this->quantidade_unidade_periodos),
                            "avaliacoes" => [[], []]
                        ]
                    ]
                ];
    
                for ($j = 1; $this->quantidade_periodos > $j; $j++)
                {
                    $this->ciclo_avaliativo[$i]["periodos"][] = [
                        "iniciado_em" => Carbon::create($this->ciclo_avaliativo[$i]["periodos"][$j - 1]["iniciado_em"])->addMonths($this->quantidade_unidade_periodos),
                        "finalizado_em" => Carbon::create($this->ciclo_avaliativo[$i]["periodos"][$j - 1]["finalizado_em"])->addMonths($this->quantidade_unidade_periodos),
                        "avaliacoes" => [[], []]
                    ];
                }
            }
            // dd($this->ciclo_avaliativo);
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updatedIniciadoEm()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedQuantidadeCiclos()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedQuantidadeUnidadeCiclos()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedUnidadeCiclos()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedQuantidadePeriodos()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedQuantidadeUnidadePeriodos()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedUnidadePeriodos()
    {
        $this->montarCicloAvaliativo();
    }
}