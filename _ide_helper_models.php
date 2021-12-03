<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $childrenCategories
 * @property-read int|null $children_categories_count
 * @property-read Category $parentCategory
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property-read \App\Models\Subscription $subscription
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Query\Builder|Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Payment withoutTrashed()
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentMethod
 *
 * @method static \Database\Factories\PaymentMethodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentStatus
 *
 * @method static \Database\Factories\PaymentStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|PaymentStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus query()
 * @method static \Illuminate\Database\Query\Builder|PaymentStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PaymentStatus withoutTrashed()
 */
	class PaymentStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Category $category
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Query\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Post withoutTrashed()
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PostStatus
 *
 * @method static \Database\Factories\PostStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|PostStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus query()
 * @method static \Illuminate\Database\Query\Builder|PostStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PostStatus withoutTrashed()
 */
	class PostStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Query\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Role withoutTrashed()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RoleUser
 *
 * @method static \Database\Factories\RoleUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Query\Builder|RoleUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @method static \Illuminate\Database\Query\Builder|RoleUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RoleUser withoutTrashed()
 */
	class RoleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subscription
 *
 * @property-read \App\Models\Payment $payment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\SubscriptionPlan $plan
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SubscriptionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Query\Builder|Subscription onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Query\Builder|Subscription withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Subscription withoutTrashed()
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubscriptionPlan
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\SubscriptionPlanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan query()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlan withoutTrashed()
 */
	class SubscriptionPlan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubscriptionPlanStatus
 *
 * @method static \Database\Factories\SubscriptionPlanStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlanStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus query()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlanStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlanStatus withoutTrashed()
 */
	class SubscriptionPlanStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubscriptionStatus
 *
 * @method static \Database\Factories\SubscriptionStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus query()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionStatus withoutTrashed()
 */
	class SubscriptionStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Payment|null $lastPayment
 * @property-read \App\Models\Subscription|null $lastSubscription
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscription[] $plans
 * @property-read int|null $plans_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserStatus
 *
 * @method static \Database\Factories\UserStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus query()
 * @method static \Illuminate\Database\Query\Builder|UserStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserStatus withoutTrashed()
 */
	class UserStatus extends \Eloquent {}
}

