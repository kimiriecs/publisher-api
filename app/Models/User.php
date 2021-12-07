<?php

namespace App\Models;

use App\Traits\HasRole;
use Doctrine\Inflector\Rules\Substitution;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'slug',
        'user_status_id',
        'profile_id',
        'profile_type',
    ];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['roles', 'status', 'profile'];


    /**
     * The attributes that should be hidden for serialization
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the parent profile model (AdminProfile or UserProfile).
     */
    public function profile()
    {
        return $this->morphTo();
    }


    /**
     * Get the roles that user belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */    
    public function roles() {

        return $this->belongsToMany(Role::class)->using(RoleUser::class);

    }


    /**
     * Get status of the current user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'user_status_id');
    }


    /**
     * Get the payments that belongs to the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */    
    public function payments() {

        return $this->hasMany(Payment::class);

    }


    /**
     * Get the last subscriptions that belongs to the user
     * 
     * payments table playes role of a pivot table for current relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\Concerns\CanBeOneOfMany::latestOfMany
     */
    public function lastPayment() {
        
        return $this->hasOne(Payment::class)->latestOfMany();

    }


    /**
     * Get the subscriptions that belongs to the user
     * 
     * payments table playes role of a pivot table for current relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions() {
        
        return $this->hasMany(Subscription::class);

    }


    /**
     * Get the last subscriptions that belongs to the user
     * 
     * payments table playes role of a pivot table for current relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\Concerns\CanBeOneOfMany::latestOfMany
     */
    public function lastSubscription() {
        
        return $this->hasOne(Subscription::class)->latestOfMany();


    }


    /**
     * Get the plans that the current user belongs to
     * 
     * payments table subscriptions roles of a pivot table for current relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plans() {
        
        return $this->belongsToMany(Subscription::class, 'subscriptions');

    }


    
    
    /**
     * Get the all posts that belongs to the user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts() {
        
        return $this->hasMany(Post::class);

    }


    /**
     * Get the last post that belongs to the user
     * 
     * @return Illuminate\Database\Eloquent\Relations\Concerns\CanBeOneOfMany::latestOfMany
     */
    public function lastPost() {
        
        return $this->hasOne(Post::class)->latestOfMany();

    }

}
