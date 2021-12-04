<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
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
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    // protected $authControllersNamespace = 'App\\Http\\Controllers';
    // protected $adminControllersNamespace = 'App\\Http\\Controllers';
    // protected $userControllersNamespace = 'App\\Http\\Controllers';
    // protected $paymentControllersNamespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();

        $this->configureRateLimiting();

        $this->routes(function () {

            Route::prefix('api')
                ->middleware('api')
                // ->namespace($this->authControllersNamespace)
                ->group(base_path('routes/api/auth.php'));

            Route::prefix('api')
                ->middleware('api')
                // ->namespace($this->adminControllersNamespace)
                ->group(base_path('routes/api/admin.php'));

            Route::prefix('api')
                ->middleware('api')
                // ->namespace($this->userControllersNamespace)
                ->group(base_path('routes/api/user.php'));

            Route::prefix('api')
                ->middleware('api')
                // ->namespace($this->paymentControllersNamespace)
                ->group(base_path('routes/api/payment.php'));



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
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }


    protected function registerRoutes()
    {
        Route::bind('category', function ($value) {
            return Category::where('id', $value)->orWhere('slug', $value)->first();
        });
        Route::bind('user', function ($value) {
            return User::where('id', $value)->orWhere('slug', $value)->first();
        });
    }


    // protected function routeConfiguration()
    // {
    //     return [
    //         'prefix' => 'admin',
    //         'middleware' => 'web',
    //     ];
    // }
}
