<?php

namespace App\Jobs;

use App\Events\SincronizacaoProgressoEvent;
use App\Livewire\NotificationBell;
use App\Models\AvaliadorAvaliado;
use App\Models\Integracao;
use App\Models\User;
use App\Models\Vinculo;
use App\Notifications\SincronizacaoFinalizadaNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SincronizarVinculosJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $integracao;

    public function __construct(User $user, Integracao $integracao) // Recebe o usuário logado
    {
        $this->user = $user;
        $this->integracao = $integracao;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::info('Sincronização Iniciada');

            $this->limparTabelas();

            DB::beginTransaction();

            $dadosVinculos = Http::get($this->integracao->url)->json()['data']  ?? [];
            if (!is_array($dadosVinculos)) {
                DB::commit();
                throw new \Exception('Dados da API em formato inválido');
            }

            $vinculosParaInserir = [];
            $relacoesParaInserir = [];

            foreach ($dadosVinculos as $index => $avaliador) {
                if (!isset($avaliador['matricula'])) {
                    Log::warning('Não existe matrícula '.$index);
                    continue;
                }

                if (empty($avaliador['matricula']) || !is_string($avaliador['matricula'])) {
                    Log::warning('Avaliador sem matrícula válida', $avaliador);
                    continue;
                }

                $vinculosParaInserir[$avaliador['matricula']] = $this->formatarDadosVinculo($avaliador, true);

                if (!empty($avaliador['vinculos']) && is_array($avaliador['vinculos'])) {
                    foreach ($avaliador['vinculos'] as $avaliado) {
                        if (!isset($avaliado['matricula'])) {
                            Log::warning('Não existe matrícula');
                            continue;
                        }

                        if (empty($avaliado['matricula']) || !is_string($avaliado['matricula'])) {
                            Log::warning('Avaliado sem matrícula válida', $avaliado);
                            continue;
                        }

                        $vinculosParaInserir[$avaliado['matricula']] = $this->formatarDadosVinculo($avaliado);
                        $relacoesParaInserir[] = [
                            'avaliador_matricula' => $avaliador['matricula'],
                            'avaliado_matricula' => $avaliado['matricula']
                        ];
                    }
                }
            }

            if (!empty($vinculosParaInserir)) {
                Vinculo::insert(array_values($vinculosParaInserir));
            }

            if (!empty($relacoesParaInserir)) {
                AvaliadorAvaliado::insert($relacoesParaInserir);
            }

            DB::commit();

            Log::info('Sincronização concluída', [
                'vinculos' => count($vinculosParaInserir),
                'relacoes' => count($relacoesParaInserir)
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Falha na sincronização: ' . $exception->getMessage());
            throw $exception; // Re-lança a exceção para o Laravel
        }

        $this->user->notify(new SincronizacaoFinalizadaNotification());
    }

    protected function limparTabelas()
    {
        Log::info('Limpando tabelas...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        AvaliadorAvaliado::truncate();
        Vinculo::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Log::info('Inserindo novos registros...');
    }

    protected function formatarDadosVinculo(array $dados, bool $isAvaliador = false): array
    {
        return [
            'matricula' => $dados['matricula'],
            'uuid'=> Str::uuid(),
            'nome' => $dados['nome_servidor'] ?? null,
            'email' => $dados['email'] ?? null,
            'condicao' => $dados['condicao'] ?? null,
            'nome_orgao' => $dados['nome_orgao'] ?? null,
            'nome_funcao' => $dados['nome_funcao'] ?? null,
            'codigo_orgao' => $dados['codigo_orgao'] ?? null,
            'codigo_funcao' => $dados['codigo_funcao'] ?? null,
            'data_admissao' => $dados['data_admissao'] ?? null,
            'data_rescisao' => !empty($dados['data_rescisao']) ? $dados['data_rescisao'] : null,
            'nome_local_trabalho' => $dados['nome_local_trabalho'] ?? null,
            'codigo_local_trabalho' => $dados['codigo_local_trabalho'] ?? null,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
