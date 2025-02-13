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
    public $finalizado_em;
    public $quantidade_ciclos;
    public $quantidade_unidade_ciclos;
    public $unidade_ciclos;
    public $quantidade_periodos;
    public $quantidade_unidade_periodos;
    public $unidade_periodos;
    public $quantidade_avaliacoes;
    public $quantidade_unidade_avaliacoes;
    public $unidade_avaliacoes;

    public $ciclo_avaliativo;
    
    
    public function mount(array $formData)
    {
        $this->formData = $formData;
        $this->iniciado_em = Carbon::now()->toDateString();
        $this->quantidade_ciclos = 2;
        $this->quantidade_unidade_ciclos = 2;
        $this->unidade_ciclos = UnidadePeriodicidadeEnum::getKey(UnidadePeriodicidadeEnum::ANOS);
        $this->quantidade_periodos = 4;
        $this->quantidade_unidade_periodos = 6;
        $this->unidade_periodos = UnidadePeriodicidadeEnum::getKey(UnidadePeriodicidadeEnum::MESES);
        $this->quantidade_avaliacoes = 6;
        $this->quantidade_unidade_avaliacoes = 1;
        $this->unidade_avaliacoes = UnidadePeriodicidadeEnum::getKey(UnidadePeriodicidadeEnum::MESES);
        
        $this->montarCicloAvaliativo();
    }

    public function render()
    {
        return view('livewire.app.ciclo-avaliativo.create', ['formData' => $this->formData]);
    }

    public function montarCicloAvaliativo()
    {
        $this->ciclo_avaliativo = [];
        $unidadeCiclos = UnidadePeriodicidadeEnum::unitForCarbon(UnidadePeriodicidadeEnum::getValue($this->unidade_ciclos));
        $unidadePeriodos = UnidadePeriodicidadeEnum::unitForCarbon(UnidadePeriodicidadeEnum::getValue($this->unidade_periodos));

        try {
            $iniciadoEm = Carbon::create($this->iniciado_em);
            $finalizadoEm = Carbon::create($this->iniciado_em)->add($unidadeCiclos, $this->quantidade_unidade_ciclos);
        
            $this->ciclo_avaliativo[] = [
                "iniciado_em" => $iniciadoEm->toDateString(),
                "finalizado_em" => $finalizadoEm->toDateString(),
                "periodos" => [
                    [
                        "iniciado_em" => Carbon::create($iniciadoEm)->toDateString(),
                        "finalizado_em" => Carbon::create($iniciadoEm)->add($unidadePeriodos, $this->quantidade_unidade_periodos)->toDateString(),
                        "avaliacoes" => $this->gerarAvaliacoes(Carbon::create($iniciadoEm), $this->quantidade_avaliacoes)
                    ]
                ]
            ];
        
            for ($i = 1; $i < $this->quantidade_periodos; $i++) {
                $iniciadoPeriodo = Carbon::create($this->ciclo_avaliativo[0]["periodos"][$i-1]["finalizado_em"]);
                $finalizadoPeriodo = Carbon::create($iniciadoPeriodo)->add($unidadePeriodos, $this->quantidade_unidade_periodos);
        
                $this->ciclo_avaliativo[0]["periodos"][] = [
                    "iniciado_em" => $iniciadoPeriodo->toDateString(),
                    "finalizado_em" => $finalizadoPeriodo->toDateString(),
                    "avaliacoes" => $this->gerarAvaliacoes(Carbon::create($iniciadoPeriodo), $this->quantidade_avaliacoes)
                ];
            }
        
            for ($i = 1; $i < $this->quantidade_ciclos; $i++) {   
                $iniciadoCiclo = Carbon::create($this->ciclo_avaliativo[$i-1]["finalizado_em"]);
                $finalizadoCiclo = Carbon::create($iniciadoCiclo)->add($unidadeCiclos, $this->quantidade_unidade_ciclos);
        
                $this->ciclo_avaliativo[] = [
                    "iniciado_em" => $iniciadoCiclo->toDateString(),
                    "finalizado_em" => $finalizadoCiclo->toDateString(),
                    "periodos" => [
                        [
                            "iniciado_em" => Carbon::create($this->ciclo_avaliativo[$i-1]["periodos"][$this->quantidade_periodos-1]["finalizado_em"])->toDateString(),
                            "finalizado_em" => Carbon::create($this->ciclo_avaliativo[$i-1]["periodos"][$this->quantidade_periodos-1]["finalizado_em"])->addMonths($this->quantidade_unidade_periodos)->toDateString(),
                            "avaliacoes" => $this->gerarAvaliacoes(Carbon::create($iniciadoCiclo), $this->quantidade_avaliacoes)
                        ]
                    ]
                ];
        
                for ($j = 1; $j < $this->quantidade_periodos; $j++) {
                    $iniciadoPeriodo = Carbon::create($this->ciclo_avaliativo[$i]["periodos"][$j - 1]["finalizado_em"]);
                    $finalizadoPeriodo = Carbon::create($iniciadoPeriodo)->add($unidadePeriodos, $this->quantidade_unidade_periodos);
        
                    $this->ciclo_avaliativo[$i]["periodos"][] = [
                        "iniciado_em" => $iniciadoPeriodo->toDateString(),
                        "finalizado_em" => $finalizadoPeriodo->toDateString(),
                        "avaliacoes" => $this->gerarAvaliacoes(Carbon::create($iniciadoPeriodo), $this->quantidade_avaliacoes)
                    ];
                }
            }
            // dd($this->ciclo_avaliativo);
            $this->finalizado_em = $this->ciclo_avaliativo[$this->quantidade_ciclos - 1]['finalizado_em'];
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }

    private function gerarAvaliacoes($dataInicio, $quantidadeAvaliacoes) {
        $avaliacoes = [];
        $ultimaData = $dataInicio; // Começa com a data inicial do período
        $unidadeAvaliacoes = UnidadePeriodicidadeEnum::unitForCarbon(UnidadePeriodicidadeEnum::getValue($this->unidade_avaliacoes));

        for ($k = 1; $k <= $quantidadeAvaliacoes; $k++) {
            $avaliacoes[] = [
                "titulo" => "Avaliação {$k}",
                "iniciado_em" => $ultimaData->toDateString(),
                "finalizado_em" => $ultimaData->add($unidadeAvaliacoes, $this->quantidade_unidade_avaliacoes)->toDateString() // Progride em semanas
            ];
            $ultimaData = Carbon::create($avaliacoes[$k - 1]["finalizado_em"]); // Usa a última data final
        }
    
        return $avaliacoes;
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

    public function updatedQuantidadeAvaliacoes()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedQuantidadeUnidadeAvaliacoes()
    {
        $this->montarCicloAvaliativo();
    }

    public function updatedUnidadeAvaliacoes()
    {
        $this->montarCicloAvaliativo();
    }
}