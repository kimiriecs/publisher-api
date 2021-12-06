<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface 
{

  public function getAllPosts()
  {
    $posts = Post::paginate(5);

    return $posts;
  }

  public function getAllPublishedPosts()
  {
    $posts = Post::where('post_status_id', 1)
                  ->paginate(5);

    return $posts;
  }

  /**
   * Get all
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function getAllPublishedPostsDescending()
  {
    $posts = Post::where('post_status_id', 1)
                  ->orderByDesc('id')
                  ->paginate(5);

    return $posts;
  }

  /**
   * Get last ten posts
   *
   * @return \Illuminate\Http\Response
   */
  public function getLastTenPost()
  {
    $posts = Post::where('post_status_id', 1)
                  ->orderByDesc('id')
                  ->take(10);

    return $posts;
  }

  /**
   * Get the post by certain autor
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */  
  public function getPostsByAutor(User $user)
  {
    $posts = Post::where('user_id', $user)
                    ->where('post_status_id', 1)
                    ->orderByDesc('id')
                    ->paginate(5);

    return $posts;
  }

  /**
   * Get the post by certain category
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */ 
  public function getPostsByCategory(Category $category)
  {
    $posts = Post::where('category_id', $category)
                    ->where('post_status_id', 1)
                    ->orderByDesc('id')
                    ->paginate(5);

    return $posts;
  }

}