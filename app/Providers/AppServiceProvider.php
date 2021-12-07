<?php

namespace App\Providers;


use App\Models\PaymentStatus;
use App\Models\PostStatus;
use App\Models\SubscriptionPlanStatus;
use App\Models\SubscriptionStatus;
use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Services\UserManagmentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // $service = new UserManagmentService();

        $this->app->bind(UserManagmentService::class, function ($app) {
            return new UserManagmentService();
        });

        $this->app->bind(
            UserRepositoryInterface::class, 
            UserRepository::class
        );

        $this->app->bind(
            PostRepositoryInterface::class, 
            PostRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'admin-profile' => 'App\Models\AdminProfile',
            'user-profile' => 'App\Models\UserProfile',
            'post' => 'App\Models\Post',
        ]);
    }
}
