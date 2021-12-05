<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'name',
        'payment_method_status_id',
    ];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['status'];

    /**
     * Get status that the current payment metods belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status() 
    {
        return $this->belongsTo(PaymentMethodStatus::class, 'payment_method_status_id');
    }
}
