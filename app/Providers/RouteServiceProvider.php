<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware(['web', 'auth.basic'])
                ->group(base_path('routes/web.php'))
                ->group(base_path('routes/app/cargo.php'))
                ->group(base_path('routes/app/ciclo-avaliativo.php'))
                ->group(base_path('routes/app/conceito-avaliacao.php'))
                ->group(base_path('routes/app/departamento.php'))
                ->group(base_path('routes/app/equipe.php'))
                ->group(base_path('routes/app/fator-avaliacao.php'))
                ->group(base_path('routes/app/fornecedor.php'))
                ->group(base_path('routes/app/indicador-desempenho.php'))
                ->group(base_path('routes/app/item-conceito-avaliacao.php'))
                ->group(base_path('routes/app/modelo-avaliacao.php'))
                ->group(base_path('routes/app/posto-trabalho.php'))
                ->group(base_path('routes/app/servidor.php'))
                ->group(base_path('routes/app/setor.php'))
                ->group(base_path('routes/app/usuario.php'))
                ->group(base_path('routes/app/vinculo.php'));

            Route::middleware('web')
                ->group(base_path('routes/app/auth.php'));
        });
    }
}
