<?php

namespace App\Models;

use Doctrine\Inflector\Rules\Substitution;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
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
        return $this->belongsTo(Status::class, 'statusable');
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
     * Get the payments that belongs to the user through the user's subscriptions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */    
    public function paymentsThroughSubscriptions() {

        return $this->hasManyThrough(Payment::class, Substitution::class);

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
     * payments table subscriptions role of a pivot table for current relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plans() {
        
        return $this->belongsToMany(Subscription::class, 'subscriptions');

    }

}
