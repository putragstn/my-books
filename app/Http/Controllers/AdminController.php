<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'title'             => 'Dashboard Admin',
            'countAuthor'       => count(Author::all()),
            'countPublisher'    => count(Publisher::all()),
            'countUserAccount'  => count(User::all()),
            'countBook'         => count(Book::all())
        ]);
    }
}
