<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;

class BookController extends Controller
{
    public function index($genreId)
    {
        $genre = BookGenre::findOrFail($genreId);

        return view('create_book', compact('genre'));
    }
    
    public function destroy($id)
    {
        $book = Book::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $book->delete();
    
        return redirect()->route('library')->with('success', 'Book deleted successfully');
    }
    
}
