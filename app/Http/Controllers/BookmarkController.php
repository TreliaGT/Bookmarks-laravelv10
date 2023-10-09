<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    /**
     *  View for All BookMarks 
     */
    public function dashboard(){
        $user = Auth::user();
        $bookmarks = $user->bookmarks;

        return view('dashboard', compact('bookmarks'));
    }

    /**
     * Show Internal Bookmark
     */
    public function show($slug){
        $bookmark = Bookmark::where('slug' , $slug)->first();
        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * Edit a Internal Book Mark
     */
    public function update(Request $request, $id){
        //validate the code
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        //find the bookmark
        $bookmark = Bookmark::findorfail($id);
        //update the bookmark
        $bookmark->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'thumbnail' => $request->input('thumbnail'),
        ]);
        //redirect to main page with the success update
        return redirect()->route('bookmark.show', $bookmark->slug)->with('success', 'Bookmark updated successfully');
    }

    /**
     * Show Create
     */
    public function create(){
        return view('bookmarks.create');
    }

    /**
     * Store new bookmark
     */
    public function store(Request $request){
        //validate the code
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        // Create a new bookmark with user_id
        $bookmark = new Bookmark([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'thumbnail' => $request->input('thumbnail'),
            'user_id' => auth()->user()->id, // Assuming you're using authentication
        ]);

        // Save the bookmark to the database
        $bookmark->save();

        //redirect to main page with the success update
        return redirect()->route('dashboard')->with('success', 'Bookmark updated successfully');
    }

    /**
     * Search Function
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('name'); // Assuming you're searching by name

        $bookmarks = Bookmark::where('name', 'like', '%' . $searchTerm . '%')->get();

        return view('dashboard', compact('bookmarks'));
    }
}
