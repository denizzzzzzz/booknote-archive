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
        $notes = Note::all();
        $notes = $book->notes;
        return view('notes_overview', compact('book', 'notes'));
    }

    public function store(Request $request)
    {

        Note::create([
            'book_id' => $request->book_id,
            'category_id' => 1,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Note added successfully!');
    }
    public function destroy($id)
    {
        $note = Note::find($id);
        if ($note) {
            $bookId = $note->book_id; // Retrieve the book ID before deleting the note
            $note->delete();
            return redirect()->route('show_notes', ['id' => $bookId])->with('success', 'Note deleted successfully');
        } else {
            // Handle the case where the note does not exist
            return redirect()->back()->with('error', 'Note not found.');
        }
    }
    
}
