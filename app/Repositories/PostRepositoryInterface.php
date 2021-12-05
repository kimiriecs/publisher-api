<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\User;

interface PostRepositoryInterface {

  public function getAllPosts();

  public function getAllPublishedPosts();

  public function getAllPublishedPostsDescending();

  public function getLastTenPost();
  
  public function getPostsByAutor(User $user);

  public function getPostsByCategory(Category $category);

}