<?php

namespace App\Repositories\CicloAvaliativoModeloAvaliacao;

use App\DTO\CicloAvaliativoModeloAvaliacao\ModeloAvaliacaoStoreDTO;
use App\Models\CicloAvaliativoModelo;
use App\Models\ModeloAvaliacao;
use App\Repositories\CicloAvaliativoModeloAvaliacao\CicloAvaliativoModeloRepositoryInterface;

class CicloAvaliativoModeloEloquentRepository implements CicloAvaliativoModeloRepositoryInterface
{
    protected $model;

    public function __construct(CicloAvaliativoModelo $model)
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

    public function find(string $uuid): ModeloAvaliacao
    {
        return $this->model
            ->where('uuid', $uuid)->first();
    }

    public function new(string $cicloAvaliativoUuid, ModeloAvaliacaoStoreDTO $dto): ModeloAvaliacao
    {
        $data = (array) $dto;
        $data['ciclos_avaliativos_uuid'] = $cicloAvaliativoUuid;

        return $this->model->create($data);
    }

    public function newVarious(string $ciclosAvaliativosUuid, array $modelosAvaliacaoUuid): void
    {
        foreach($modelosAvaliacaoUuid as $modeloAvaliacaoUuid)
        {
            $this->model->create([
                "ciclos_avaliativos_uuid" => $ciclosAvaliativosUuid,
                "modelos_avaliacao_uuid" => $modeloAvaliacaoUuid
            ]);
        }
    }
}
