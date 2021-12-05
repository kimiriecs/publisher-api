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
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class, 
            UserRepository::class
        );

        $this->app->bind(
            PostRepositoryInterface::class, 
            PostRepository::class
        );

        // $this->app->bind(PaymentStatus::class, function ($app) {
        //     return new PaymentStatus();
        // });
        // $this->app->bind(PostStatus::class, function ($app) {
        //     return new PostStatus();
        // });
        // $this->app->bind(SubscriptionStatus::class, function ($app) {
        //     return new SubscriptionStatus();
        // });
        // $this->app->bind(SubscriptionPlanStatus::class, function ($app) {
        //     return new SubscriptionPlanStatus();
        // });
        // $this->app->bind(SubscriptionStatus::class, function ($app) {
        //     return new SubscriptionStatus();
        // });
        // $this->app->bind(UserStatus::class, function ($app) {
        //     return new UserStatus();
        // });

        $this->app->bind(
            
            StatusInterface::class, function () {

            return [
                UserStatus::class,
                SubscriptionStatus::class,
                SubscriptionPlanStatus::class,
                SubscriptionStatus::class,
                PostStatus::class,
                PaymentStatus::class,
            ];
            
        });
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
