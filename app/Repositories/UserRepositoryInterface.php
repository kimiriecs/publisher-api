<?php

namespace Modules\Users\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Categories\Models\Category;

interface UserRepositoryInterface {

  public function getUsers(Category $subCategory=null);

  public function getter(Category $subCategory):Collection;

  public function getColumns():array;

  public function getAllUsers():Collection;

  public function getAdministrators():Collection;

  public function getTrainers():Collection;

  public function getTrainees():Collection;

  public function getFolowers():Collection;

  public function getAllCategories():Collection;
    
}