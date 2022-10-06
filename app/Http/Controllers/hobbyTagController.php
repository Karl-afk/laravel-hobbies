<?php

namespace App\Http\Controllers;

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
}
