<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Http\Requests\StoreHobbyRequest;
use App\Http\Requests\UpdateHobbyRequest;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hobbies = Hobby::all();
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
            'beschreibung' => $request->beschreibung
        ]);
        $hobby->save();
        // return redirect()->route('hobby.index')->with('success', $hobby);
        return $this->index()->with(['success' => 'Hobby <b>' . $hobby->name . '</b> erfolgreich angelegt']);
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
        return view('hobby.show')->with('hobby', $hobby);
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

        return $this->index()->with(['success' => 'Hobby <b>' . $request->name . '</b> erfolgreich geändert.']);
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
        return $this->index()->with(['success' => 'Hobby <b>' . $oldName . '</b> erfolgreich gelöscht.']);
    }
}
