<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Tags\Tag;
use App\Models\Bookmark;

class TagsController extends Controller
{
    /**
     * View Tags
     */
    public function index(){
        $tags = Tag::all();

        return view('tags.index' , compact('tags'));
    }

    /**
     * Create
     */
    public function store(Request $request){
        $tag = Tag::create(['name' => $request->input('name')]);
     
        return redirec('/tags');
    }


    /**
     * Update
     */
    public function update($tag , Request $request){
        // Find a tag
        $tag = Tag::findFromString($tag)->get();

        // Update properties
        $tag->name = $request->input('name');

        // Save the changes
        $tag->save();

        return redirec('/tags');
    }

    /**
     * Delete
     */
    public function destory($tag){
        $tag = Tag::findFromString($tag)->get();
        $bookmark = Bookmark::withAllTags([$tag])->get();
        foreach($bookmark as $book){
            $bookmark->detachTag($tag);
        }

        $tag->delete();

        return redirec('/tags');
    }
}
