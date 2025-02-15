<?php

namespace App\Repositories\CicloAvaliativo;

use App\DTO\CicloAvaliativo\CicloAvaliativoStoreDTO;
use App\Models\CicloAvaliativo;
use App\Models\Vinculo;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;
use Illuminate\Database\Eloquent\Collection;

class CicloAvaliativoEloquentRepository implements CicloAvaliativoRepositoryInterface
{
    protected $model;

    public function __construct(CicloAvaliativo $model)
    {
        $this->model = $model;
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
