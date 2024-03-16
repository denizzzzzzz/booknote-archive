<?php

namespace App\Livewire;

use App\Models\BookGenre;
use App\Models\User;
use Livewire\Component;

class ShowBookGenres extends Component
{
    public $userId;
    public $bookGenres;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->loadBookGenres();
    }

    public function loadBookGenres()
    {
        $user = User::find($this->userId);
        if ($user) {
            $this->bookGenres = $user->bookGenres;
        }
    }

    public function deleteGenre($genreId)
    {
        $user = User::find($this->userId);

        if ($user) {
            $user->bookGenres()->detach($genreId);
            $this->loadBookGenres(); 
            return redirect('library')->with('success', 'Closet Deleted');
        }
    }
    public function render()
    {
        return view('livewire.show-book-genres');
    }
}
