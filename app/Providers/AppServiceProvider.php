<?php

namespace App\Providers;

use App\Models\Avaliacao;
use App\Models\RegraPontuacaoAvaliacao;
use App\Models\RegraPontuacaoCiclo;
use App\Models\Cargo;
use App\Models\Ciclo;
use App\Models\CicloAvaliativo;
use App\Models\CicloAvaliativoIncidencia;
use App\Models\CicloAvaliativoModelo;
use App\Models\ConceitoAvaliacao;
use App\Models\Departamento;
use App\Models\Equipe;
use App\Models\FatorAvaliacao;
use App\Models\Fornecedor;
use App\Models\Incidencia;
use App\Models\IndicadorDesempenho;
use App\Models\ItemConceitoAvaliacao;
use App\Models\ModeloAvaliacao;
use App\Models\Periodicidade;
use App\Models\Periodo;
use App\Models\PostoTrabalho;
use App\Models\RegraPontuacaoPeriodo;
use App\Models\Servidor;
use App\Models\Setor;
use App\Models\Vinculo;
use App\Observers\CargoObserver;
use App\Models\User;
use App\Models\VinculoAvaliacao;
use App\Observers\AvaliacaoObserver;
use App\Observers\RegraPontuacaoAvaliacaoObserver;
use App\Observers\RegraPontuacaoCicloObserver;
use App\Observers\CicloAvaliativoModeloObserver;
use App\Observers\CicloAvaliativoObserver;
use App\Observers\CicloObserver;
use App\Observers\ConceitoAvaliacaoObserver;
use App\Observers\DepartamentoObserver;
use App\Observers\EquipeObserver;
use App\Observers\FatorAvaliacaoObserver;
use App\Observers\FornecedorObserver;
use App\Observers\IncidenciaObserver;
use App\Observers\IndicadorDesempenhoObserver;
use App\Observers\ItemConceitoAvaliacaoObserver;
use App\Observers\ModeloAvaliacaoObserver;
use App\Observers\PeriodicidadeObserver;
use App\Observers\PeriodoObserver;
use App\Observers\PostoTrabalhoObserver;
use App\Observers\RegraPontuacaoPeriodoObserver;
use App\Observers\ServidorObserver;
use App\Observers\SetorObserver;
use App\Observers\UsuarioObserver;
use App\Observers\VinculoAvaliacaoObserver;
use App\Observers\VinculoObserver;
use App\Repositories\Avaliacao\AvaliacaoEloquentRepository;
use App\Repositories\Avaliacao\AvaliacaoRepositoryInterface;
use App\Repositories\Avaliador\AvaliadorEloquentRepository;
use App\Repositories\Avaliador\AvaliadorRepositoryInterface;
use App\Repositories\RegraPontuacaoAvaliacao\RegraPontuacaoAvaliacaoEloquentRepository;
use App\Repositories\RegraPontuacaoAvaliacao\RegraPontuacaoAvaliacaoRepositoryInterface;
use App\Repositories\RegraPontuacaoCiclo\RegraPontuacaoCicloEloquentRepository;
use App\Repositories\RegraPontuacaoCiclo\RegraPontuacaoCicloRepositoryInterface;
use App\Repositories\Cargo\CargoEloquentRepository;
use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\CicloAvaliativo\CicloAvaliativoEloquentRepository;
use App\Repositories\CicloAvaliativo\CicloAvaliativoRepositoryInterface;
use App\Repositories\CicloAvaliativoIncidencia\IncidenciaEloquentRepository;
use App\Repositories\CicloAvaliativoIncidencia\IncidenciaRepositoryInterface;
use App\Repositories\CicloAvaliativoModeloAvaliacao\CicloAvaliativoModeloEloquentRepository;
use App\Repositories\CicloAvaliativoModeloAvaliacao\CicloAvaliativoModeloRepositoryInterface;
use App\Repositories\CicloAvaliativoPeriodicidade\PeriodicidadeEloquentRepository;
use App\Repositories\CicloAvaliativoPeriodicidade\PeriodicidadeRepositoryInterface;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoEloquentRepository;
use App\Repositories\ConceitoAvaliacao\ConceitoAvaliacaoRepositoryInterface;
use App\Repositories\Departamento\DepartamentoEloquentRepository;
use App\Repositories\Departamento\DepartamentoRepositoryInterface;
use App\Repositories\ItemConceitoAvaliacao\ItemConceitoAvaliacaoEloquentRepository;
use App\Repositories\ItemConceitoAvaliacao\ItemConceitoAvaliacaoRepositoryInterface;
use App\Repositories\Equipe\EquipeEloquentRepository;
use App\Repositories\Equipe\EquipeRepositoryInterface;
use App\Repositories\FatorAvaliacao\FatorAvaliacaoEloquentRepository;
use App\Repositories\FatorAvaliacao\FatorAvaliacaoRepositoryInterface;
use App\Repositories\Fornecedor\FornecedorEloquentRepository;
use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use App\Repositories\IndicadorDesempenho\IndicadorDesempenhoEloquentRepository;
use App\Repositories\IndicadorDesempenho\IndicadorDesempenhoRepositoryInterface;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoEloquentRepository;
use App\Repositories\ModeloAvaliacao\ModeloAvaliacaoRepositoryInterface;
use App\Repositories\PostoTrabalho\PostoTrabalhoEloquentRepository;
use App\Repositories\PostoTrabalho\PostoTrabalhoRepositoryInterface;
use App\Repositories\RegraPontuacaoPeriodo\RegraPontuacaoPeriodoEloquentRepository;
use App\Repositories\RegraPontuacaoPeriodo\RegraPontuacaoPeriodoRepositoryInterface;
use App\Repositories\Servidor\ServidorEloquentRepository;
use App\Repositories\Servidor\ServidorRepositoryInterface;
use App\Repositories\Setor\SetorEloquentRepository;
use App\Repositories\Setor\SetorRepositoryInterface;
use App\Repositories\Usuario\UsuarioEloquentRepository;
use App\Repositories\Usuario\UsuarioRepositoryInterface;
use App\Repositories\Vinculo\VinculoEloquentRepository;
use App\Repositories\Vinculo\VinculoRepositoryInterface;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoEloquentRepository;
use App\Repositories\VinculoAvaliacao\VinculoAvaliacaoRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(
            ServidorRepositoryInterface::class, ServidorEloquentRepository::class
        );
        $this->app->bind(
            FornecedorRepositoryInterface::class, FornecedorEloquentRepository::class
        );
        $this->app->bind(
            CargoRepositoryInterface::class, CargoEloquentRepository::class
        );
        $this->app->bind(
            UsuarioRepositoryInterface::class, UsuarioEloquentRepository::class
        );
        $this->app->bind(
            ModeloAvaliacaoRepositoryInterface::class, ModeloAvaliacaoEloquentRepository::class
        );
        $this->app->bind(
            EquipeRepositoryInterface::class, EquipeEloquentRepository::class
        );
        $this->app->bind(
            ConceitoAvaliacaoRepositoryInterface::class, ConceitoAvaliacaoEloquentRepository::class
        );
        $this->app->bind(
            ItemConceitoAvaliacaoRepositoryInterface::class, ItemConceitoAvaliacaoEloquentRepository::class
        );
        $this->app->bind(
            FatorAvaliacaoRepositoryInterface::class, FatorAvaliacaoEloquentRepository::class
        );
        $this->app->bind(
            IndicadorDesempenhoRepositoryInterface::class, IndicadorDesempenhoEloquentRepository::class
        );
        $this->app->bind(
            PostoTrabalhoRepositoryInterface::class, PostoTrabalhoEloquentRepository::class
        );
        $this->app->bind(
            SetorRepositoryInterface::class, SetorEloquentRepository::class
        );
        $this->app->bind(
            DepartamentoRepositoryInterface::class, DepartamentoEloquentRepository::class
        );
        $this->app->bind(
            CicloAvaliativoRepositoryInterface::class, CicloAvaliativoEloquentRepository::class
        );
        $this->app->bind(
            PeriodicidadeRepositoryInterface::class, PeriodicidadeEloquentRepository::class
        );
        $this->app->bind(
            VinculoRepositoryInterface::class, VinculoEloquentRepository::class
        );
        $this->app->bind(
            IncidenciaRepositoryInterface::class, IncidenciaEloquentRepository::class
        );
        $this->app->bind(
            CicloAvaliativoModeloRepositoryInterface::class, CicloAvaliativoModeloEloquentRepository::class
        );
        $this->app->bind(
            AvaliadorRepositoryInterface::class, AvaliadorEloquentRepository::class
        );
        $this->app->bind(
            AvaliacaoRepositoryInterface::class, AvaliacaoEloquentRepository::class
        );
        $this->app->bind(
            VinculoAvaliacaoRepositoryInterface::class, VinculoAvaliacaoEloquentRepository::class
        );
        $this->app->bind(
            RegraPontuacaoCicloRepositoryInterface::class, RegraPontuacaoCicloEloquentRepository::class
        );
        $this->app->bind(
            RegraPontuacaoPeriodoRepositoryInterface::class, RegraPontuacaoPeriodoEloquentRepository::class
        );
        $this->app->bind(
            RegraPontuacaoAvaliacaoRepositoryInterface::class, RegraPontuacaoAvaliacaoEloquentRepository::class
        );
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cargo::observe(CargoObserver::class);
        Fornecedor::observe(FornecedorObserver::class);
        Servidor::observe(ServidorObserver::class);
        User::observe(UsuarioObserver::class);
        ModeloAvaliacao::observe(ModeloAvaliacaoObserver::class);
        Equipe::observe(EquipeObserver::class);
        ConceitoAvaliacao::observe(ConceitoAvaliacaoObserver::class);
        ItemConceitoAvaliacao::observe(ItemConceitoAvaliacaoObserver::class);
        FatorAvaliacao::observe(FatorAvaliacaoObserver::class);
        IndicadorDesempenho::observe(IndicadorDesempenhoObserver::class);
        Setor::observe(SetorObserver::class);
        PostoTrabalho::observe(PostoTrabalhoObserver::class);
        Departamento::observe(DepartamentoObserver::class);
        CicloAvaliativo::observe(CicloAvaliativoObserver::class);
        CicloAvaliativoIncidencia::observe(IncidenciaObserver::class);
        CicloAvaliativoModelo::observe(CicloAvaliativoModeloObserver::class);
        Vinculo::observe(VinculoObserver::class);
        Avaliacao::observe(AvaliacaoObserver::class);
        Ciclo::observe(CicloObserver::class);
        Periodo::observe(PeriodoObserver::class);
        VinculoAvaliacao::observe(VinculoAvaliacaoObserver::class);
        RegraPontuacaoCiclo::observe(RegraPontuacaoCicloObserver::class);
        RegraPontuacaoPeriodo::observe(RegraPontuacaoPeriodoObserver::class);
        RegraPontuacaoAvaliacao::observe(RegraPontuacaoAvaliacaoObserver::class);

        Validator::extend('validarIdadeAdmissao', function ($attribute, $value, $parameters, $validator) {
            $dataNascimento = $validator->getData()['data_nascimento'];
            $dataAdmissao = $value;

            $diffAnos = now()->parse($dataNascimento)->diffInYears(now()->parse($dataAdmissao));

            return $diffAnos >= 16;
        });

        Validator::extend('notFutureDate', function ($attribute, $value, $parameters, $validator) {
            return now()->gte(now()->parse($value));
        });
    }
}
