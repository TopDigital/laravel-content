<?php

namespace TopDigital\Content\Http\Controllers;

use TopDigital\Auth\Http\Controllers\BaseController;
use TopDigital\Content\Http\Requests\UpdateContentRequest;
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
     * Store a newly created resource in storage.
     *
     * @param  UpdateContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateContentRequest $request)
    {
        $post = new Post();
        $post->fill($request->validated());
        $post->save();

        return response(
            PostResource::make($post)
        );
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
        ]);
    }
}
