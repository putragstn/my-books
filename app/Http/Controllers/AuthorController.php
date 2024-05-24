<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.author.index', [
            'title'     => 'Authors',
            'authors'   => Author::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.author.create', [
            'title' => 'Create New Author'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',  // filename
            'author_name'   => 'required',
            'date_of_birth' => 'required',
            'country'       => 'required',
            'sex'           => 'required'
        ]);

        $input = $request->all();

        // dd($input);

        if ($image = $request->file('author_image')) {
            $destinationPath = 'img/author-image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['author_image'] = "$profileImage";
        }

        Author::create($input);

        return redirect()->route('author.index')->with('success', 'Author created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('menu.author.edit', [
            'title'     => 'Edit Author',
            'author'    => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'author_image'  => 'required',
            'author_name'   => 'required',
            'date_of_birth' => 'required',
            'country'       => 'required',
            'sex'           => 'required'
        ]);

        $author->update($request->except(['_token']));
        return redirect()->route('author.index')->with('success', 'Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')->with('success', 'Author deleted successfully');
    }
}
