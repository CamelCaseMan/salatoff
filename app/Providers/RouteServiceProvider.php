<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
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
        RateLimiter::for ('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });

        RateLimiter::for ('register', function (Request $request) {
            return Limit::perMinute(3)->by($request->phone . $request->ip())->response(function () {
                return new Response('Слишком много попыток регистрации - повторите запрос позже', 429);
            });
        });

        RateLimiter::for ('generate_code', function (Request $request) {
            return Limit::perMinute(3)->by($request->phone . $request->ip())->response(function () {
                return new Response('Слишком много попыток отправить смс - повторите позже', 429);
            });
        });

        RateLimiter::for ('login', function (Request $request) {
            return Limit::perMinute(3)->by($request->phone . $request->ip())->response(function () {
                return new Response('Слишком много попыток повторите позже', 429);
            });
        });

    }
}
