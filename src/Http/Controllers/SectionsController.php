<?php

namespace TopDigital\Content\Http\Controllers;

use TopDigital\Auth\Http\Controllers\BaseController;
use TopDigital\Content\Http\Requests\UpdateContentRequest;
use TopDigital\Content\Http\Resources\SectionCollection;
use TopDigital\Content\Http\Resources\SectionResource;
use TopDigital\Content\Models\Section;

class SectionsController extends BaseController
{
    public function __construct()
    {
        \Auth::shouldUse('api');

        $this->authorizeResource(Section::class);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return new SectionCollection(Section::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpdateContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateContentRequest $request)
    {
        $section = new Section();
        $section->fill($request->validated());
        $section->save();

        return response(
            SectionResource::make($section)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContentRequest  $request
     * @param  \TopDigital\Content\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentRequest $request, Section $section)
    {
        $section->update($request->validated());
        $section->refresh();

        return response(
            SectionResource::make($section)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TopDigital\Content\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        try {
            $section->delete();
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
