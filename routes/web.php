<?php

use App\Http\Controllers\App\Dashboard\DashboardIndexController;
use Illuminate\Support\Facades\Route;

$periodoFinalizado = [
    "qtd_pontos" => 100,
    "ciclo_avaliativo" => [
        "data_inicio" => "",
        "data_fim" => ""
    ],
    "periodo_avaliativo" => [
        "data_inicio" => "",
        "data_fim" => ""
    ]
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
        "ocorrencia" => "FALTA_JUSTIFICADA",
        "quantidade" => 5
    ]
];

$regrasDeCalculo = [
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
            "status_vinculo_ciclo" => null,
            "status_ciclo" => null,
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
            "ate" => 70,
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
            "pontuacao" => 5,
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
            "pontuacao" => 1,
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
            "pontuacao" => 1,
            "status_vinculo_ciclo" => null,
            "status_vinculo_periodo" => null,
            "status_ciclo" => null,
            "status_periodo" => null
        ],
        // -- alteração de status do periodo por média e alta quantidade da ocorrencia
        [
            "tipo_ocorrencia" => "FALTA",
            "ocorrencia" => "FALTA_INJUSTIFICADA",
            "de" => 5,
            "ate" => 9,
            "pontuacao" => 1,
            "status_vinculo_ciclo" => null,
            "status_vinculo_periodo" => null,
            "status_ciclo" => null,
            "status_periodo" => null
        ],
        // -- alteração de status do ciclo por média e alta quantidade da ocorrencia
        [
            "tipo_ocorrencia" => "FALTA",
            "ocorrencia" => "FALTA_INJUSTIFICADA",
            "de" => 50,
            "ate" => 100000,
            "pontuacao" => 1,
            "status_vinculo_ciclo" => "null",
            "status_vinculo_periodo" => "null",
            "status_ciclo" => "null",
            "status_periodo" => "null"
        ]
    ]
];

Route::get('avaliacao-finalizar', function() use (
        $ocorrenciasDentroDoPeriodo,
        $regrasDeCalculo,
        $regrasDeOcorrencia) 
{
    // -- finalização do período
    foreach($ocorrenciasDentroDoPeriodo as $ocorrenciaDentroDoPeriodo) {
        // dd($ocorrenciaDentroDoPeriodo);
        // -- pesquisa no array as regras deste tioi de ocorrencia
        dd(array_map(function($regra) use ($ocorrenciaDentroDoPeriodo) {
            dd($regra);
            return $regra['ocorrencia'] == $ocorrenciaDentroDoPeriodo['ocorrencia'];
        }, $regrasDeOcorrencia));
    }

    // -- regras de ocorrência

    // -- regras de cálculo 
    
    dd(
        "ocorrências encontradas", $ocorrenciasDentroDoPeriodo, 
        "regras de calculo de pontuação", $regrasDeCalculo, 
        "regras de calculo de ocorrencia", $regrasDeOcorrencia
    );
});

Route::middleware(['auth.basic'])->group(function() {
    Route::get('/dashboard', [DashboardIndexController::class, 'index'])->name('dashboard.index');
});
