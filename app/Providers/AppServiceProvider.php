<?php

namespace App\Providers;

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
