<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Http\Requests\StoreHobbyRequest;
use App\Http\Requests\UpdateHobbyRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $hobbies = Hobby::all();
        // $hobbies = Hobby::paginate(10);
        $hobbies = Hobby::orderBy('created_at')->paginate(10);
        return view('hobby.index')->with(['hobbies' => $hobbies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHobbyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHobbyRequest $request)
    {
        //
        $request->validate([
            'name' => 'required | min:3',
            'beschreibung' => 'required | min:5'
        ]);

        $hobby = new Hobby([
            'name' => $request->name,
            'beschreibung' => $request->beschreibung,
            'user_id' => auth()->id()
        ]);
        $hobby->save();
        // return redirect()->route('hobby.index')->with('success', $hobby);
        // return $this->index()->with(['success' => 'Hobby <b>' . $hobby->name . '</b> erfolgreich angelegt']);
        return redirect('/hobby/' . $hobby->id)->with(['info' => 'Bitte weise noch Tags zu']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby)
    {
        //

        $allTags = Tag::all();
        $usedTags = $hobby->tags;
        $availableTags = $allTags->diff($usedTags);
        $success = Session::get('success');
        $info = Session::get('info');
        return view('hobby.show')->with(
            [
                'hobby' => $hobby,
                'success' => $success,
                'verfuegbareTags' => $availableTags,
                'info' => $info
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobby $hobby)
    {
        //
        return view('hobby.edit')->with('hobby', $hobby);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHobbyRequest  $request
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHobbyRequest $request, Hobby $hobby)
    {
        //
        $request->validate([
            'name' => 'required | min:3',
            'beschreibung' => 'required | min:5'
        ]);

        $hobby->update([
            'name' => $request->name,
            'beschreibung' => $request->beschreibung
        ]);

        return $this->index()->with(['success' => 'Hobby <b>' . $request->name . '</b> erfolgreich ge??ndert.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        //
        $oldName = $hobby->name;
        $hobby->delete();
        return $this->index()->with(['success' => 'Hobby <b>' . $oldName . '</b> erfolgreich ge??nder.']);
    }
}
