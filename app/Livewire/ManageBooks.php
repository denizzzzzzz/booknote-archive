<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithPagination;

class ManageBooks extends Component
{
    use WithPagination;

    public $title = '';
    public $description = '';
    public $showFlashMessage = false;
    public $flashMessage = '';
    public $open;

    use InteractsWithBanner;

    protected $listeners = ['book-added' => '$refresh', 'book-deleted' => '$refresh'];

    public function toggleModal($state = null)
    {
        $this->open = $state !== null ? $state : !$this->open;

        if (!$this->open) {
            $this->reset(['title', 'description']);
        }
    }

    public function saveBook()
    {
        $this->validate([
            'title' => 'required|string|max:30',
            'description' => 'nullable|string|max:100',
        ]);

        $book = new Book();
        $book->title = $this->title;
        $book->description = $this->description;
        $book->user_id = Auth::id();
        $book->save();
        $this->reset(['title', 'description']);
        session()->flash('message', 'Book added');
        $this->dispatch('book-added');
        $this->open = false;
    }

    public function deleteBook($bookId)
    {
        $book = Book::find($bookId);
        $book->delete();
        session()->flash('message', 'Book deleted');
        $this->dispatch('book-deleted');
    }

    public function render()
    {
        $books = Book::where('user_id', Auth::id())
            ->orderBy('title')
            ->paginate(20);
        return view('livewire.manage-books', compact('books'));
    }
}
