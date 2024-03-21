<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination; 

class ShowBooks extends Component
{
    use WithPagination; 

    public $genreId;


    public function mount($genreId)
    {
        $this->genreId = $genreId;
    }

    public function render()
    {

        $books = Book::where('genre_id', $this->genreId)
        ->orderBy('title') 
        ->paginate(1000); 
        return view('livewire.show-books', compact('books'));
    }
}
