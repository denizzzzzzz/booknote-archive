<div>
<form class="add-books-form shadow-xl border-4 p-10 bg-white my-40" wire:submit.prevent="saveBooks">
<h3><a href="{{ route('library') }}"> Back </a></h3>
<h3 class="text-4xl text-center mb-10">Add books</h3>
    @foreach ($books as $index => $book)
        @csrf
        <div class="flex flex-col gap-4  mb-6">
            <input wire:model="books.{{ $index }}.title" class="text-2xl border-b-2 border-t-0 border-x-0 px-0 py-2" type="text" name="title" placeholder="Book Title" required>
        </div>
        <div class="flex flex-col gap-4  mb-6">
            <textarea wire:model="books.{{ $index }}.description" class="text-2xl border-2 px-2 py-2" name="description" placeholder="Description" required></textarea>
        </div>
        <div wire:click.prevent="removeBook({{ $index }})">
            delete
        </div>
        @endforeach
        <button type="button" wire:click.prevent="addBook">Add Another Book</button>
        <input type="hidden" name="genre_id" value="{{ $genre->id }}">
        <div class="flex justify-center mt-4">
            <button type="submit" class="px-20 py-2 bg-[#01A262] text-white text-2xl font-bold">Add to {{$genre->title}}</button>
        </div>
    </form>
   

    </div>
</div>

</div>
