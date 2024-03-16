<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function create($genreId)
    {
        $genre = BookGenre::findOrFail($genreId);
        
        return view('create_book', compact('genre'));
    }

    public function store(Request $request)
    {

        $book = new Book();
        $book->user_id = Auth::id();
        $book->genre_id = $request->genre_id;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->image = $request->image;

        $book->save();

        return redirect()->route('library')->with('success', 'Book added successfully!');
    }
}
