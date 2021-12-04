<?php

namespace Modules\Users\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Categories\Models\Category;
use Modules\Users\Models\User;

class BaseRepository  implements UserRepositoryInterface {


  public function getColumns():array {

    $tableColumns = DB::getSchemaBuilder()->getColumnListing('users');
    
    $columnsToRetrive = ['id', 'name', 'email'];
    
    $columns = array_intersect($columnsToRetrive, $tableColumns);
    
    return $columns;
  }


  public function getUsers(Category $subCategory=null)
  {
    
      $users = $subCategory !== null 
                ? $this->getter($subCategory)
                : $this->getAllUsers();
   
    return $users;
  }


  public function getter(Category $subCategory):Collection
  {

    switch ($subCategory->slug) {
      case 'administration':
        $users = $this->getAdministrators();
        break;
      case 'trainers':
        $users = $this->getTrainers();
        break;
      case 'trainees':
        $users = $this->getTrainees();
        break;
      case 'folowers':
        $users = $this->getFolowers();
        break;
      
      default:
        $users = $this->getAllUsers();
        break;
    }
    return $users;
  }


  public function getAllUsers():Collection {

    $users = User::with('roles')->get();

    return $users;

  }


  public function getAdministrators():Collection{

    $users = User::with('roles')
      ->whereHas('roles', function($q) {
        $q->whereIn('roles.id', [1, 2]);
    })->get();

    return $users;
  }

  public function getTrainers():Collection{

    $users = User::with('roles')
      ->whereHas('roles', function($q) {
      $q->whereIn('roles.id', [3]);
    })->get();

    return $users;
  }

  public function getTrainees():Collection{

    $users = User::with('roles')
      ->whereHas('roles', function($q) {
      $q->whereIn('roles.id', [4]);
    })->get();

    return $users;
  }

  public function getFolowers():Collection{

    $users = User::with('roles')
      ->whereHas('roles', function($q) {
      $q->whereIn('roles.id', [5]);
    })->get();

    return $users;
  }

  public function getAllCategories():Collection{

    $categories = Category::all();

    return $categories;
  }


}