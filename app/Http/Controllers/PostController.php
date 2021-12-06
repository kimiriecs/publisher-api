<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\PostStatus;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->getAllPublishedPostsDescending();

        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        $post = Post::create([
            'title'             => $data['title'],
            'body'              => $data['body'],
            'user_id'           => Auth::user()->id,
            'category_id'       => $data['category_id'],
            'post_status_id'    => PostStatus::where('name', 'draft')->first('id')->id,
        ]);

        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::find($post);

        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \PostCreateRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->user_id = $data['user_id'];
        $post->category_id = $data['category_id'];
        $post->post_status_id = $data['post_status_id'];

        $post->save();

        return $post;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \PostCreateRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePostStatus(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post->post_status_id = $data['post_status_id'];

        $post->save();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post);

        return $post->delete();
    }
}
