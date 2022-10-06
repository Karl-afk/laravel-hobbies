<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return view('tag.index')->with(['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        //
        $request->validate(['name' => 'required|min:3']);

        $tag = new Tag([
            'name' => $request->name,
            'style' => $request->style
        ]);

        $tag->save();

        return $this->index()->with([
            'success' => 'Das Tag <b>' . $tag->name . '</b> wurde erstellt.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('tag.show')->with(['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('tag.edit')->with(['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
        $request->validate(['name' => 'required|min:3']);

        $tag->update([
            'name' => $request->name,
            'style' => $request->style
        ]);

        return $this->index()->with([
            'success' => 'Das Tag <b>' . $tag->name . '</b> geändert.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $oldName = $tag->name;

        $tag->delete();
        return $this->index()->with([
            'success' => 'Das Tag <b>' . $oldName . '</b> wurde gelöscht.'
        ]);
    }
}
