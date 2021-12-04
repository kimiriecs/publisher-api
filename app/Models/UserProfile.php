<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
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
    ];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user', 'image'];


    /**
     * Get the UserProfile's user model
     */
    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    
    /**
     * Get the UserProfile's image model
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
