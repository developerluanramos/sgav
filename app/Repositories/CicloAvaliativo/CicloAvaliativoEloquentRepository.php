<?php

namespace App\Repositories\CicloAvaliativo;

use App\DTO\CicloAvaliativo\CicloAvaliativoStoreDTO;
use App\Models\CicloAvaliativo;
use App\Models\Vinculo;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CicloAvaliativoEloquentRepository implements CicloAvaliativoRepositoryInterface
{
    protected $model;
    protected $today; // Carbon

    public function __construct(CicloAvaliativo $model)
    {
        $this->model = $model;
        $this->today = Carbon::now()->addMonths(8);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function totalQuantity() : int {
        return $this->model->count();
    }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model;

//        if(!is_null($filter)) {
//            $query->where("nome", "like", "%".$filter."%");
//            $query->orWhere("situacao", "like", "%".$filter."%");
//        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function find(string $uuid): CicloAvaliativo
    {
        return $this->model
            ->with('incidencias')
            ->where('uuid', $uuid)->first();
    }

    public function findByDate(string $date): CicloAvaliativo
    {
        dd($date);
        return $this->model
            ->with('incidencias')
            ->where('iniciado_em', '>=', $date)
            ->orWhere('finalizado_em', '<=', $date)
            ->first();
    }

    public function new(CicloAvaliativoStoreDTO $dto): CicloAvaliativo
    {
        return $this->model->create((array)$dto);
    }

    public function update($uuid, $data): CicloAvaliativo
    {
        $this->model->where("uuid", $uuid)->update($data);

        return $this->find($uuid);
    }

    public function show(string $uuid): CicloAvaliativo
    {
        return $this->model
            ->with([
                'incidencias', 
                'ciclos', 
                'periodos', 
                'avaliacoes', 
                'modelos.fatores.indicadores.conceito.itens'
            ])
            ->where('uuid', $uuid)->first();
    }

    /**
     * Informações detalhadas sobre o ciclo avaliativo baseando-se na data atual
     * como principal parâmetro.
     * (melhorar essa descrição)
     * 
     * @param string $uuid
     * @return array{cicloAtual: string, ciclosFuturos: string, ciclosPassados: string}
     */
    public function details(string $uuid): array
    {
        $cicloAvaliativo = $this->show($uuid);
        $cicloAtual = "";
        $ciclosPassados = [];
        $ciclosFuturos = [];

        $periodoAtual = "";
        $periodosPassados = [];
        $periodosFuturos = [];

        $avaliacaoAtual = "";
        $avaliacoesPassadas = [];
        $avaliacoesFuturas = [];

        foreach($cicloAvaliativo->ciclos as $ciclo) {
            if($ciclo->iniciado_em <= $this->today->toDateString() && $ciclo->finalizado_em >= $this->today->toDateString()) {
                $cicloAtual = $ciclo;
            } else if($ciclo->iniciado_em < $this->today->toDateString() && $ciclo->finalizado_em < $this->today->toDateString()) {
                $ciclosPassados[] = $ciclo;
            } else if($ciclo->iniciado_em > $this->today->toDateString() && $ciclo->finalizado_em > $this->today->toDateString()) {
                $ciclosFuturos[] = $ciclo;
            }

            foreach ($ciclo->periodos as $periodo) {
                if($periodo->iniciado_em <= $this->today->toDateString() && $periodo->finalizado_em >= $this->today->toDateString()) {
                    $periodoAtual = $periodo;
                } else if($periodo->iniciado_em < $this->today->toDateString() && $periodo->finalizado_em < $this->today->toDateString()) {
                    $periodosPassados[] = $periodo;
                } else if($periodo->iniciado_em > $this->today->toDateString() && $periodo->finalizado_em > $this->today->toDateString()) {
                    $periodosFuturos[] = $periodo;
                }

                foreach ($periodo->avaliacoes as $avaliacao) {
                    if($avaliacao->iniciado_em <= $this->today->toDateString() && $avaliacao->finalizado_em >= $this->today->toDateString()) {
                        $avaliacaoAtual = $avaliacao;
                    } else if($avaliacao->iniciado_em < $this->today->toDateString() && $avaliacao->finalizado_em < $this->today->toDateString()) {
                        $avaliacoesPassadas[] = $avaliacao;
                    } else if($avaliacao->iniciado_em > $this->today->toDateString() && $avaliacao->finalizado_em > $this->today->toDateString()) {
                        $avaliacoesFuturas[] = $avaliacao;
                    }
                }
            }
        }
        
        return [
            "cicloAtual" => $cicloAtual,
            "ciclosPassados" => $ciclosPassados,
            "ciclosFuturos" => $ciclosFuturos,
            "periodoAtual" => $periodoAtual,
            "periodosPassados" => $periodosPassados,
            "periodosFuturos" => $periodosFuturos,
            "avaliacaoAtual" => $avaliacaoAtual,
            "avaliacoesPassadas" => $avaliacoesPassadas,
            "avaliacoesFuturas" => $avaliacoesFuturas,
            "uuids" => [
                "cicloAtual" => $cicloAtual->uuid ?? null,
                "ciclosPassados" => (new Collection($ciclosPassados))->pluck("uuid")->toArray(),
                "ciclosFuturos" => (new Collection($ciclosFuturos))->pluck("uuid")->toArray(),
                "periodoAtual" => $periodoAtual->uuid ?? null,
                "periodosPassados" => (new Collection($periodosPassados))->pluck("uuid")->toArray(),
                "periodosFuturos" => (new Collection($periodosFuturos))->pluck("uuid")->toArray(),
                "avaliacaoAtual" => $avaliacaoAtual->uuid ?? null,
                "avaliacoesPassadas" => (new Collection($avaliacoesPassadas))->pluck("uuid")->toArray(),
                "avaliacoesFuturas" => (new Collection($avaliacoesFuturas))->pluck("uuid")->toArray(),
            ]
        ];
    }

    public function avaliados(string $uuid): \Illuminate\Database\Eloquent\Builder
    {
        $cicloAvaliativo = $this->find($uuid);
        $codigosOrgaos = [];
        $codigosLocaisTrabalho = [];
        $codigosFuncoes = [];

        foreach($cicloAvaliativo->incidencias as $incidencia)
        {
            foreach(json_decode(json_decode($incidencia['orgaos'])) as $orgao)
            {
                array_push($codigosOrgaos, $orgao->codigo_orgao);
            }

            foreach(json_decode(json_decode($incidencia['locais_trabalho'])) as $orgao)
            {
                array_push($codigosLocaisTrabalho, $orgao->codigo_local_trabalho);
            }

            foreach(json_decode(json_decode($incidencia['funcoes'])) as $funcao)
            {
                array_push($codigosFuncoes, $funcao->codigo_funcao);
            }
        }
       
        
        $vinculos = Vinculo::where('avaliador', false)
            // ->when(!empty($codigosOrgaos), function($query) use ($codigosOrgaos) {
                ->whereIn('codigo_orgao', $codigosOrgaos)
            // })
            // ->when(!empty($codigosFuncoes), function($query) use ($codigosFuncoes) {
                ->whereIn('codigo_funcao', $codigosFuncoes)
            // })
            // ->when(!empty($codigosLocaisTrabalho), function($query) use ($codigosLocaisTrabalho) {
                ->whereIn('codigo_local_trabalho', $codigosLocaisTrabalho);
            // });

        return $vinculos;
    }
}
