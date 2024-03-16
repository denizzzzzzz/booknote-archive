<?php

namespace App\Livewire;

use App\Models\BookGenre;
use Livewire\Component;

class SelectBookGenre extends Component
{
    public $bookGenres;
    public $selectedGenre = null;

    public function mount()
    {
        $this->bookGenres = BookGenre::all();
    }

    public function selectGenre($genreId)
    {
        $this->selectedGenre = $genreId;
    }

    public function confirmSelection()
    {
        if (!is_null($this->selectedGenre)) {

            $user = auth()->user();
            $user->bookGenres()->attach($this->selectedGenre);

            return redirect('library')->with('success', 'Closet Added!');

        }
    }

    public function render()
    {
        return view('livewire.select-book-genre');
    }
}
