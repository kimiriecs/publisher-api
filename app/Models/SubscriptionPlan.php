<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPlan extends Model
{
    use HasFactory;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price',
        'posts_total_count',
        'subscription_period',
        'subscription_plan_status_id',
    ];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['status'];

    /**
     * Get the users that the current plan belongs to
     * 
     * payments table subscriptions role of a pivot table for current relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        
        return $this->belongsToMany(User::class, 'subscriptions');

    }

    /**
     * Get status that the current subscription plan belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status() 
    {
        return $this->belongsTo(SubscriptionPlanStatus::class, 'subscription_plan_status_id');
    }
}
