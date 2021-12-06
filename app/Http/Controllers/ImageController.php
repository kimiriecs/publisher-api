<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageCreateRequest;
use App\Http\Requests\ImageUpdateRequest;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(15);

        return $images;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ImageCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageCreateRequest $request)
    {
        $data = $request->validatedd();

        $image = Image::create([
            'url'               => $data['url'],
            'description'       => $data['description'],
            'imageable_id'      => $data['imageable_id'],
            'imageable_type'    => $data['imageable_type'],
        ]);
        
        $image->save();

        return $image;
    }

    /**
     * Display the specified resource
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        $image = Image::find($image->id);

        return $image;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ImageUpdateRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageUpdateRequest $request, Image $image)
    {
        $data = $request->validated();

        $image = Image::find($image->id);

        $image->url          = $data['url'];
        $image->description  = $data['description'];

        $image->save();

        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image = Image::find($image->id);

        $image->delete();

        return response('resource deleted successfully', 200);
    }
}
