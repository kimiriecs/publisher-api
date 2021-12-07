<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\UserProfileController;

use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\SubscriptionPlanStatusController;

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionStatusController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentStatusController;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


#--------------------------------------------------------------------------
# 								Admin Routes
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Auth Routes

Route::post('/register', [RegisterController::class, 'register'])
	->name('register');

Route::post('/login', [LoginController::class, 'login'])
	->name('login');

Route::middleware('auth:sanctum')
	->post('/logout', [LoginController::class, 'logout'])
	->name('logout');

#	Auth Routes END
#--------------------------------------------------------------------------

Route::middleware(['auth:sanctum'])  
// Route::middleware(['auth:sanctum', 'is.admin:admin']) //? 'is.admin:admin'... NEED to be implemented
		->prefix('admin')->as('admin.')->group(function() {

#--------------------------------------------------------------------------
#	User Routes

	Route::apiResource('users', UserController::class)
			->names(['index' => 'all']);

	Route::apiResource('user-statuses', UserStatusController::class)
			->names(['index' => 'all'])
			->parameters(['user-statuses' => 'status']);;

#	User Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Role Routes

	Route::apiResource('roles', RoleController::class)
			->names(['index' => 'all']);

#	Role Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Profile Routes

	Route::as('profiles.')
			->prefix('profiles')
			->group(function () {

		Route::apiResource('admin-profiles', AdminProfileController::class)
			->names(['index' => 'all'])
			->parameters(['admin-profiles' => 'profile']);

		Route::apiResource('user-profiles', UserProfileController::class)
			->names(['index' => 'all'])
			->parameters(['user-profiles' => 'profile']);
	});

#	Profile Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Subscription Plan Routes

	Route::apiResource('subscription-plans', SubscriptionPlanController::class)
			->names(['index' => 'all']);

	Route::apiResource('subscripition-plan-statuses', SubscriptionPlanStatusController::class)
			->names(['index' => 'all'])
			->parameters(['subscripition-plan-statuses' => 'status']);

#	Subscription Plan Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Subscription Routes

	Route::apiResource('subscripitions', SubscriptionController::class)
			->names(['index' => 'all']);

	Route::apiResource('subscripition-statuses', SubscriptionStatusController::class)
			->names(['index' => 'all'])
			->parameters(['subscripition-statuses' => 'status']);

#	Subscription Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Payment Routes

	Route::apiResource('payments', PaymentController::class)
			->names(['index' => 'all']);

	Route::apiResource('payment-statuses', PaymentStatusController::class)
			->names(['index' => 'all'])
			->parameters(['payment-statuses' => 'status']);


	Route::prefix('user/payments')
			->as('user.payments.')
			->group(function() {

		Route::get('/', [PaymentController::class, 'currentUserPayments'])
			->name('all');

		Route::get('/{payment}', [PaymentController::class, 'currentUserPaymentShow'])
			->name('show');
	});

#	Payment Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Currency Routes

	Route::apiResource('currencies', CurrencyController::class)
			->names(['index' => 'all']);

#	Currency Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Category Routes

	Route::apiResource('categories', CategoryController::class)
			->names(['index' => 'all']);

#	Category Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Post Routes

	Route::apiResource('posts', PostController::class)
			->names(['index' => 'all']);

	Route::apiResource('post-statuses', PostStatusController::class)
			->names(['index' => 'all'])
			->parameters(['post-statuses' => 'status']);

#	Post Routes END
#--------------------------------------------------------------------------

#--------------------------------------------------------------------------
#	Image Routes

	Route::apiResource('images', ImageController::class)
			->names(['index' => 'all']);

#	Image Routes END
#--------------------------------------------------------------------------

});							
#----------------------------Admin Routes END--------------------------------
