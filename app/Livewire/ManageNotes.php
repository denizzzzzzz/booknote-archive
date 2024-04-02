<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Note;
use App\Models\NoteCategory;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class ManageNotes extends Component
{


    use WithFileUploads;
    public $bookId;
    public $selectedCategoryId = null;
    public $image;
    public $recognizedText;
    public $content = '';
    public $title;
    public $loading = false;
    public $open;
    public $editingNoteId = null;
    public $showCategoryInput = false;
    public $newCategoryName = '';

    protected $listeners = ['note-added' => 'refreshNotes', 'category-added' => '$refresh', 'note-deleted' => '$refresh', 'note-edited' => '$refresh'];

    public function mount()
    {
        $book = Book::where('id', $this->bookId)->first();
        $firstCategory = $book->categories()->first();
        $this->selectedCategoryId = $firstCategory->id;
    }



    protected $rules = [
        'title' => 'required|string|max:255',
        'image' => 'image|max:10240',
    ];

    public function toggleCategoryInput()
    {
        $this->showCategoryInput = !$this->showCategoryInput;
    }

    public function saveCategory()
    {
        $this->validate([
            'newCategoryName' => 'required|string|max:255',
        ]);

        $category = new NoteCategory();
        $category->title = $this->newCategoryName;
        $category->book_id = $this->bookId;
        $category->user_id = Auth::id();
        $category->save();

        $this->newCategoryName = '';
        $this->showCategoryInput = false;
        $this->dispatch('category-added');
        session()->flash('message', 'New category added');
        $this->selectCategory($category->id);
    }

    public function selectCategory($categoryId = null)
    {
        $this->selectedCategoryId = $categoryId;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:10240',
        ]);

        $this->reset(['recognizedText']);
        $this->recognizeHandwriting();
    }

    public function toggleModal($state = null)
    {
        $this->open = $state !== null ? $state : !$this->open;

        if (!$this->open) {
            $this->reset(['title', 'content', 'image', 'editingNoteId']);
        }
    }

    public function recognizeHandwriting()
    {
        $this->loading = true;
        try {
            if ($this->image) {
                $filePath = $this->image->getRealPath();
                $imageAnnotator = new ImageAnnotatorClient();
                $image = file_get_contents($filePath);
                $response = $imageAnnotator->documentTextDetection($image);
                $texts = $response->getFullTextAnnotation();
                $imageAnnotator->close();

                if ($texts) {
                    $this->content = $texts->getText();
                } else {
                    $this->content = 'No text found.';
                }
            }
        } catch (Throwable $e) {
            $this->content = "Error during text recognition: " . $e->getMessage();
        } finally {
            $this->loading = false;
        }
    }

    public function saveNote()
    {
        if ($this->selectedCategoryId === null) {
            $defaultCategory = NoteCategory::where('title', 'Home')
                ->where('book_id', $this->bookId)
                ->first();

            if ($defaultCategory) {
                $this->selectedCategoryId = $defaultCategory->id;
            } else {
            }
        }

        if ($this->editingNoteId) {
            $note = Note::findOrFail($this->editingNoteId);
            $note->category_id = $this->selectedCategoryId;
            $this->dispatch('note-edited');
            $this->dispatch('note-added', ['categoryId' => $this->selectedCategoryId]);
            session()->flash('message', 'Note updated.');
        } else {
            $note = new Note();
            $note->book_id = $this->bookId;
            $note->category_id = $this->selectedCategoryId;
            $this->dispatch('note-added', ['categoryId' => $this->selectedCategoryId]);
            session()->flash('message', 'Note added');
        }

        $note->title = $this->title;
        $note->content = $this->content;
        $note->save();

        $this->open = false;
        $this->reset(['title', 'content', 'image', 'editingNoteId', 'selectedCategoryId']);
    }

    public function refreshNotes($payload)
    {
        $this->selectCategory($payload['categoryId']);
    }

    public function editNote($noteId)
    {
        $note = Note::findOrFail($noteId);
        $this->selectedCategoryId = $note->category_id;
        $this->title = $note->title;
        $this->content = $note->content;
        $this->editingNoteId = $noteId;
        $this->open = true;
    }

    public function deleteNote($noteId)
    {
        $note = Note::findOrFail($noteId);
        $note->delete();
        $this->dispatch('note-deleted');
        session()->flash('message', 'Note deleted');
    }


    public function render()
    {
        $book = Book::where('id', $this->bookId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $categories = NoteCategory::where('book_id', $this->bookId)
            ->get();

        $notes = collect();

        if ($this->selectedCategoryId) {
            $notes = $book->notes()
                ->where('category_id', $this->selectedCategoryId)
                ->orderBy('created_at', 'desc')
                ->paginate(12);
        } else {
            $notes = $book->notes()
                ->whereNull('category_id')
                ->orderBy('created_at', 'desc')
                ->paginate(12);
        }

        return view('livewire.manage-notes', compact('categories', 'notes'));
    }
}
