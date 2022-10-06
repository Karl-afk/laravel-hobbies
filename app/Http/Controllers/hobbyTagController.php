<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Tag;
use Illuminate\Http\Request;

class hobbyTagController extends Controller
{
    public function getFilteredHobbies($tag_id)
    {
        $tag = new Tag();
        $filteredHobbies = $tag::findOrFail($tag_id)->filteredHobbies()->paginate(10);

        return view('hobby.filteredByTag')->with(['hobbies' => $filteredHobbies]);
    }

    public function attachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);
        return back()->with('success', 'Der Tag <b>' . $tag->name . '</b> wurde hinzugefügt');
    }
    public function detachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);

        return back()->with('success', 'Der Tag <b>' . $tag->name . '</b> wurde entfernt');
    }
}
