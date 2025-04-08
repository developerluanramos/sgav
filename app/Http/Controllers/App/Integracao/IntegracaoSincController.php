<?php

namespace App\Http\Controllers\App\Integracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Integracao\IntegracaoIndexRequest;
use App\Jobs\SincronizarVinculosJob;
use App\Models\Integracao;
use App\Notifications\SincronizacaoIniciadaNotification;

class IntegracaoSincController extends Controller
{
    public function __construct(

    ) { }

    public function sinc(string $integracaoUuid, IntegracaoIndexRequest $integracaoIndexRequest)
    {
        $user = auth()->user();

        $integracao = Integracao::where('uuid', $integracaoUuid)->first();

        $user->notify(new SincronizacaoIniciadaNotification());

        SincronizarVinculosJob::dispatch($user, $integracao)->onQueue('default');

        return redirect()->to(route('integracao.index'));
    }
}
