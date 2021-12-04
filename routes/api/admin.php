<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])
//  Route::middleware(['auth:sanctum', 'admin'])  NEED to implement AdminMiddleware
        ->prefix('admin')
        ->as('admin.')
        ->group(function() {
            Route::apiResource('users', UserController::class)
                    ->names(['index' => 'all'])
                    ->parameters(['users' => 'admin-user']);
});
