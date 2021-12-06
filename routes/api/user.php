<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;

use Illuminate\Support\Facades\Route;


#--------------------------------------------------------------------------
# 								User Routes
#--------------------------------------------------------------------------



Route::middleware(['auth:sanctum'])
		->group(function() {

#--------------------------------------------------------------------------
#	Profile Routes

	Route::as('profiles.')
			->prefix('profiles')
			->group(function () {

		Route::apiResource('user-profiles', UserProfileController::class)
			->names(['index' => 'all'])
			->parameters(['user_profiles' => 'profile'])
			->only(['index', 'show']);
	});

#	Profile Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Subscription Plan Routes

	Route::apiResource('subscription-plans', SubscriptionPlanController::class)
			->names(['index' => 'all'])
			->only(['index', 'show']);

#	Subscription Plan Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Subscription Routes
	Route::middleware(['is.author:author', 'is.owner:owner']) //? 'is.owner:owner'... NEED to be implemented
			->group(function() {
		Route::apiResource('subscripitions', SubscriptionController::class)
				->names(['index' => 'all'])
				->only(['index', 'show']);

	});
#	Subscription Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Payment Routes
	Route::middleware(['is.author:author', 'is.owner:owner', 'has.active.subscription:active']) //? 'is.owner:owner'... NEED to be implemented
					->group(function() {
		Route::apiResource('payments', PaymentController::class)
				->names(['index' => 'all'])
				->only(['store']);

		Route::prefix('user/payments')
				->as('user.payments.')
				->group(function() {

			Route::get('/', [PaymentController::class, 'currentUserPayments'])
				->name('all');

			Route::get('/{payment}', [PaymentController::class, 'currentUserPaymentShow'])
				->name('show');
		});
	});

#	Payment Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Category Routes

	Route::apiResource('categories', CategoryController::class)
			->names(['index' => 'all'])
			->only(['index', 'show']);

#	Category Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Post Routes
	Route::middleware(['is.author:author', 'is.owner:owner']) //? 'is:owner' for 'delete' and 'update' routes
			->group(function() {
		Route::apiResource('posts', PostController::class)
				->names(['index' => 'all']);

	});
#	Post Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Image Routes

	Route::apiResource('images', ImageController::class) //? 'is:owner' for 'delete' and 'update' routes
			->names(['index' => 'all']);

#	Image Routes END
#--------------------------------------------------------------------------

});							
#----------------------------User Routes END--------------------------------
