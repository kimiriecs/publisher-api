<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
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
        'slug',
        'description',
        'parent_category_id',
    ];

    /**
     * Get parent category of current category
     *
     * @return void
     */
    public function parentCategory()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * Get children categories of current category
     *
     * @return void
     */
    public function childrenCategories()
    {
        return $this->hasMany(Category::class);
    }


    /**
     * Get posts that belong to the current category
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
