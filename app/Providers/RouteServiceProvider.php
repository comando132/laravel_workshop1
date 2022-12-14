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
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {

        RateLimiter::for('cars_limiter', function (Request $request) {
            return Limit::perMinute(100)->response(function() {
                return response('Demasiados intentos de acceso.', 429);
            });
        });

        RateLimiter::for('car_limiter', function (Request $request) {
            return Limit::perMinute(200)->response(function() {
                return response('Has excedido el limite de acceso.', 429);
            });
        });

        RateLimiter::for('brands_limiter', function (Request $request) {
            return Limit::perHour(25)->response(function() {
                return response('El limite de acceso se ha excedido.', 429);
            });
        });
//        RateLimiter::for('api', function (Request $request) {
//            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
//        });
    }
}
