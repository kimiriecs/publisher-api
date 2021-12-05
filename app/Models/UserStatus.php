<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
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
        'description',
    ];


    /**
     * Get all users that belong to status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users() 
    {
        return $this->hasMany(User::class);
    }
}
