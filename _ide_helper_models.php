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
 * App\Models\AdminProfile
 *
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\AdminProfileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProfile newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProfile query()
 * @method static \Illuminate\Database\Query\Builder|AdminProfile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminProfile withoutTrashed()
 */
	class AdminProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int|null $parent_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $childrenCategories
 * @property-read int|null $children_categories_count
 * @property-read Category|null $parentCategory
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $encryption
 * @property int $user_id
 * @property int $subscription_id
 * @property int|null $payment_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\PaymentStatus $status
 * @property-read \App\Models\Subscription $subscription
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Payment withoutTrashed()
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentMethod
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PaymentMethodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereUpdatedAt($value)
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentStatus
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\PaymentStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|PaymentStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PaymentStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PaymentStatus withoutTrashed()
 */
	class PaymentStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property int|null $category_id
 * @property int|null $post_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\PostStatus $status
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Post withoutTrashed()
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PostStatus
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\PostStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|PostStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PostStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PostStatus withoutTrashed()
 */
	class PostStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Role withoutTrashed()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RoleUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\RoleUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Query\Builder|RoleUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|RoleUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RoleUser withoutTrashed()
 */
	class RoleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subscription
 *
 * @property int $id
 * @property int $encryption
 * @property int|null $posts_used_count
 * @property int|null $day_remains
 * @property string|null $started_at
 * @property string|null $finished_at
 * @property int $user_id
 * @property int $subscription_plan_id
 * @property int|null $subscription_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Payment $payment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\SubscriptionPlan $plan
 * @property-read \App\Models\SubscriptionStatus $status
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SubscriptionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Query\Builder|Subscription onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDayRemains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePostsUsedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereSubscriptionPlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereSubscriptionStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Subscription withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Subscription withoutTrashed()
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubscriptionPlan
 *
 * @property int $id
 * @property string $name
 * @property int|null $price
 * @property int|null $posts_total_count
 * @property int $subscription_period
 * @property int|null $subscription_plan_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\SubscriptionPlanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan wherePostsTotalCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereSubscriptionPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereSubscriptionPlanStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlan withoutTrashed()
 */
	class SubscriptionPlan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubscriptionPlanStatus
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\SubscriptionPlanStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlanStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionPlanStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlanStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionPlanStatus withoutTrashed()
 */
	class SubscriptionPlanStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubscriptionStatus
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\SubscriptionStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionStatus whereUpdatedAt($value)
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
 * @property int|null $user_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Payment|null $lastPayment
 * @property-read \App\Models\Subscription|null $lastSubscription
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $paymentsThroughSubscriptions
 * @property-read int|null $payments_through_subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscription[] $plans
 * @property-read int|null $plans_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\UserStatus $status
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserProfile
 *
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\UserProfileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Query\Builder|UserProfile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserProfile withoutTrashed()
 */
	class UserProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserStatus
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\UserStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|UserStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserStatus withoutTrashed()
 */
	class UserStatus extends \Eloquent {}
}

