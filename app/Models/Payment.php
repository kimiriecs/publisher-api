<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'encryption',
        'amount',
        'user_id',
        'subscription_id',
        'payment_status_id',
    ];
    
    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['status'];


    /**
     * Get the user that corresponds to the payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {

        return $this->belongsTo(User::class);

    }


    /**
     * Get the subscription that corresponds to the payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription() {

        return $this->belongsTo(Subscription::class);

    }

    
    
    /**
     * Get status of the current payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }
}
