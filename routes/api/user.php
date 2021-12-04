<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])
      ->as('users.')
      ->group(function () {
            Route::apiResource('users', UserController::class)
                  ->names(['index' => 'all'])
                  ->only(['index', 'show']);
      });
