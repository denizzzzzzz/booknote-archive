<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrFail($id);
        $notes = $book->notes;
        $noteCategories = $book->notes->map(function($note) {
        return $note->category;
    })->unique('id');

    return view('pages.notes', compact('book', 'noteCategories', 'notes'));
    }


}
