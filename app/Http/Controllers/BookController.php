<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.book.index', [
            'title' => 'Book',
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.book.create', [
            'title'         => 'Create New Book',
            'books'         => Book::all(),
            'authors'       => Author::all(),
            'publishers'    => Publisher::all(),
            'categories'    => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'       => 'required',
            'book_image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',  // filename
            'book_title'    => 'required',
            'author_id'     => 'required',
            'publisher_id'  => 'required',
            'release_date'  => 'required',
            'page'          => 'required',
            'category_id'   => 'required',
            'status_baca'   => 'required'
        ]);

        $input = $request->all();

        // dd($input);

        if ($image = $request->file('book_image')) {
            $destinationPath = 'img/book-image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['book_image'] = "$profileImage";
        }

        Book::create($input);

        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('menu.book.detail', [
            'title' => 'Detail Book'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('menu.book.edit', [
            'title' => 'Edit Book',
            'book'  => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
