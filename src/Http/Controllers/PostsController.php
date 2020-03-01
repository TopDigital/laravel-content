<?php

namespace TopDigital\Content\Http\Controllers;

use TopDigital\Auth\Http\Controllers\BaseController;
use TopDigital\Content\Http\Requests\UpdateContentRequest;
use TopDigital\Content\Http\Requests\UploadPreviewRequest;
use TopDigital\Content\Http\Resources\PostCollection;
use TopDigital\Content\Http\Resources\PostResource;
use TopDigital\Content\Models\Post;

class PostsController extends BaseController
{
    public function __construct()
    {
        \Auth::shouldUse('api');

        $this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return new PostCollection(Post::all());
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response(
            PostResource::make($post)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpdateContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateContentRequest $request)
    {
        $post = new Post();
        $post->fill($request->validated());
        $post->author_id = \Auth::id();
        $post->save();

        return response(
            PostResource::make($post)
        );
    }

    /**
     * @param UploadPreviewRequest $request
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     */
    public function storePreview(UploadPreviewRequest $request, Post $post)
    {
        if( $request->validated()){
            $media = $post
                ->addMediaFromRequest('preview')
                ->withCustomProperties(['mime-type' => 'image/jpeg'])
                ->usingFileName($post->slug .'.jpg')
                ->toMediaCollection('preview')
            ;

            $post->preview_url = $media->getUrl();
            $post->save();

            return response()->json(['url' => $post->preview_url]);
        }

        return response()->json(['error' => 'MIME type is not acccepted']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContentRequest  $request
     * @param  \TopDigital\Content\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentRequest $request, Post $post)
    {
        $post->update($request->validated());
        $post->refresh();

        return response(
            PostResource::make($post)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TopDigital\Content\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        }
        catch(\Exception $e) {
            return response()->json(['success' => false]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'index' => 'index',
            'storePreview' => 'update',
        ]);
    }
}
