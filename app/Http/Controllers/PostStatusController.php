<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusCreateRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\PostStatus;

class PostStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postStatuses = PostStatus::all();

        return $postStatuses;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        $input = $request->validated();

        $postStatus = PostStatus::create([
          'name'            => $input['name'],
          'description'     => $input['description'],
        ]);

        $postStatus->save();

        return $postStatus;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostStatus  $postStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PostStatus $postStatus)
    {
        $postStatus = PostStatus::find($postStatus->id);

        return $postStatus;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusUpdateRequest  $request
     * @param  \App\Models\PostStatus  $postStatus
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, PostStatus $postStatus)
    {
        $data = $request->validated();

        $postStatus = PostStatus::find($postStatus->id);

        $postStatus->name = $data['name'];
        $postStatus->description = $data['description'];

        $postStatus->save();

        return $postStatus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostStatus  $postStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostStatus $postStatus)
    {
        $postStatus = PostStatus::find($postStatus->id);

        $postStatus->delete();

        return response('resource updated successfully', 200);
    }
}
