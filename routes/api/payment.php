<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Payment Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])
      ->group(function () {

        Route::apiResource('payments', PaymentController::class)
              ->names(['index' => 'all'])
              ->only(['index', 'store']);

        Route::prefix('user/payments')
              ->as('user.payments.')
              ->group(function() {
                  Route::get('/', [PaymentController::class, 'currentUserPayments'])->name('all');
                  Route::get('/{payment}', [PaymentController::class, 'currentUserPaymentShow'])->name('show');
              });
      });