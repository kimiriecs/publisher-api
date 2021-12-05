<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'url',
        'description',
        'imageable_id',
        'imageable_type',
    ];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [];


    /**
     * Get the parent profile model (AdminProfile or UserProfile).
     */
    public function profile()
    {
        return $this->morphTo();
    }


    /**
     * Get the parent profile model (Post).
     */
    public function post()
    {
        return $this->morphTo();
    }
}
