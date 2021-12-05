<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProfile extends Model
{
    use HasFactory;
    use SoftDeletes;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'uuid',
        'nikname',
        'phone',
    ];



    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['image'];


    /**
     * Get the AdminProfile's user model
     */
    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }


    /**
     * Get the AdminProfile's image model
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
