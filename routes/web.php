<?php

use App\Http\Controllers\App\Dashboard\DashboardIndexController;
use Illuminate\Support\Facades\Route;

$periodoFinalizado = [
    "quantidade_pontos" => 100,
    "status_periodo" => "",
    "status_vinculo_periodo" => "",
    "status_ciclo" => "",
    "status_vinculo_ciclo" => "",
    // "ciclo_avaliativo" => [
    //     "data_inicio" => "",
    //     "data_fim" => ""
    // ],
    // "periodo_avaliativo" => [
    //     "data_inicio" => "",
    //     "data_fim" => ""
    // ]
];

$cicloAvaliativo = [
    [
        "data_inicio" => "",
        "data_fim" => ""
    ],
    [
        "data_inicio" => "",
        "data_fim" => ""
    ]
];

$periodosAvaliacao = [
    [
        "data_inicio" => "",
        "data_fim" => ""
    ],
    [
        "data_inicio" => "",
        "data_fim" => ""
    ]
];

$ocorrenciasDentroDoPeriodo = [
    [
        "ocorrencia" => "FALTA_INJUSTIFICADA",
        "quantidade" => 10
    ],
    [
        "ocorrencia" => "FALTA_INJUSTIFICADA",
        "quantidade" => 10
    ],
    [
        "ocorrencia" => "FALTA_INJUSTIFICADA",
        "quantidade" => 10
    ]
];

$regrasDePontuacao = [
    "periodo" => [
        [
            "status_vinculo_periodo" => "REPROVADO",
            "status_periodo" => "FINALIZADO",
            "status_vinculo_ciclo" => "REPROVADO",
            "status_ciclo" => "FINALIZADO",
            "de" => 0, 
            "ate" => 9,
        ],
        [
            "status_vinculo_periodo" => "REPROVADO",
            "status_periodo" => "FINALIZADO",
            "status_vinculo_ciclo" => "INAPTO",
            "status_ciclo" => "FINALIZADO",
            "de" => 10, 
            "ate" => 20,
        ],
        [
            "status_vinculo_periodo" => "REPROVADO",
            "status_periodo" => "FINALIZADO",
            "status_vinculo_ciclo" => "EM_ANDAMENTO",
            "status_ciclo" => "EM_ANDAMENTO",
            "de" => 21, 
            "ate" => 59,
        ],
        [
            "status_vinculo_periodo" => "APROVADO_COM_RESSALVAS",
            "status_periodo" => "FINALIZADO",
            "status_vinculo_ciclo" => null,
            "status_ciclo" => null,
            "de" => 60, 
            "ate" => 70,
        ],
        [
            "status_vinculo_periodo" => "APROVADO",
            "status_periodo" => "FINALIZADO",
            "status_vinculo_ciclo" => null,
            "status_ciclo" => null,
            "de" => 60, 
            "ate" => 100,
        ]
    ],
];

$regrasDeOcorrencia = [
    "periodo" => [
        // -- adição de pontos por baixa quantidade da ocorrencia
        [
            "tipo_ocorrencia" => "FALTA",
            "ocorrencia" => "FALTA_JUSTIFICADA",
            "de" => 0,
            "ate" => 2,
            "pontuacao" => -5,
            "status_vinculo_ciclo" => "",
            "status_vinculo_periodo" => "",
            "status_ciclo" => "",
            "status_periodo" => ""
        ],
        // -- subtração de pontos por média e alta quantidade da ocorrencia
        [
            "tipo_ocorrencia" => "FALTA",
            "ocorrencia" => "FALTA_JUSTIFICADA",
            "de" => 3,
            "ate" => 5,
            "pontuacao" => -10,
            "status_vinculo_ciclo" => null,
            "status_vinculo_periodo" => null,
            "status_ciclo" => null,
            "status_periodo" => null
        ],
        // -- subtração de pontos por média e alta quantidade da ocorrencia
        [
            "tipo_ocorrencia" => "FALTA",
            "ocorrencia" => "FALTA_INJUSTIFICADA",
            "de" => 5,
            "ate" => 9,
            "pontuacao" => -15,
            "status_vinculo_ciclo" => null,
            "status_vinculo_periodo" => null,
            "status_ciclo" => null,
            "status_periodo" => null
        ],
        // -- alteração de status do periodo por média e alta quantidade da ocorrencia
        [
            "tipo_ocorrencia" => "FALTA",
            "ocorrencia" => "FALTA_INJUSTIFICADA",
            "de" => 10,
            "ate" => 20,
            "pontuacao" => -30,
            "status_vinculo_ciclo" => null,
            "status_vinculo_periodo" => null,
            "status_ciclo" => null,
            "status_periodo" => null
        ],
        // -- alteração de status do ciclo por média e alta quantidade da ocorrencia
        [
            "tipo_ocorrencia" => "FALTA",
            "ocorrencia" => "FALTA_INJUSTIFICADA",
            "de" => 21,
            "ate" => 100000,
            "pontuacao" => -50,
            "status_vinculo_ciclo" => "null",
            "status_vinculo_periodo" => "null",
            "status_ciclo" => "null",
            "status_periodo" => "null"
        ]
    ]
];

Route::get('avaliacao-finalizar', function() use (
        $ocorrenciasDentroDoPeriodo,
        $regrasDePontuacao,
        $regrasDeOcorrencia,
        $periodoFinalizado) 
{
    // -- finalização do período
    // -- regras de ocorrência
    foreach($ocorrenciasDentroDoPeriodo as $ocorrenciaDentroDoPeriodo) 
    {
        $ocorrenciasFiltradas = array_filter($regrasDeOcorrencia['periodo'], function($regraOcorrencia) use ($ocorrenciaDentroDoPeriodo) {
            return $regraOcorrencia['ocorrencia'] == $ocorrenciaDentroDoPeriodo['ocorrencia'];
        });
        
        $extrato = '';
        foreach($ocorrenciasFiltradas as $ocorrencia) 
        {
            echo $ocorrenciaDentroDoPeriodo['quantidade'] . '</br>';
            if($ocorrencia['de'] <= $ocorrenciaDentroDoPeriodo['quantidade'] && $ocorrencia['ate'] >= $ocorrenciaDentroDoPeriodo['quantidade']) 
            {
                $periodoFinalizado['quantidade_pontos'] =  $periodoFinalizado['quantidade_pontos'] + $ocorrencia['pontuacao'];
            }
        }
    }

    // -- regras de pontuação
    foreach($regrasDePontuacao['periodo'] as $regraPontuacao) 
    {
        if($regraPontuacao['de'] <= $periodoFinalizado['quantidade_pontos'] && $regraPontuacao['ate'] >= $periodoFinalizado['quantidade_pontos']) 
        {
            $periodoFinalizado["status_ciclo"] = $regraPontuacao['status_ciclo'];
            $periodoFinalizado["status_vinculo_periodo"] = $regraPontuacao['status_vinculo_periodo'];
            $periodoFinalizado["status_vinculo_ciclo"] = $regraPontuacao['status_vinculo_ciclo'];
            $periodoFinalizado["status_periodo"] = $regraPontuacao['status_periodo'];
        }
    }

    dd($periodoFinalizado);
});

Route::middleware(['auth.basic'])->group(function() {
    Route::get('/dashboard', [DashboardIndexController::class, 'index'])->name('dashboard.index');
});
