<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\BookGenre;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookForm extends Component
{
    public $books = [];
    public $genreId;

    public function mount($genreId)
    {
        $this->genreId = $genreId;
        $this->books[] = ['title' => '', 'description' => '', 'genre_id' => $this->genreId];
    }

    public function addBook()
    {
        $this->books[] = ['title' => '', 'description' => '', 'genre_id' => $this->genreId];
    }

    public function removeBook($index)
    {
        unset($this->books[$index]);
        $this->books = array_values($this->books); 
    }

    public function saveBooks()
    {
        foreach ($this->books as $bookData) {
            $book = new Book();
            $book->user_id = Auth::id(); 
            $book->genre_id = $this->genreId; 
            $book->title = $bookData['title'];
            $book->description = $bookData['description'];
            $book->image = '';

            $book->save();
        }

        session()->flash('message', 'Books added successfully!');
        return redirect()->route('library'); 
    }
    public function render()
    {
        $genre = BookGenre::find($this->genreId);
        return view('livewire.book-form', compact('genre'));
    }
}
