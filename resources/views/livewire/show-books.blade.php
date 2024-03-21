<div>
<div class="books">
@if($books->isEmpty())
<div class="text-center w-full mb-12">
<h3 class="text-2xl ">Your books would go here, add your first book with the white button below ;)</h3>
</div>

@else
    @foreach($books as $book)
    <div class="book-container">
        <div class="book">
            <a href="{{ route('show_notes', $book->id) }}" class="book-link">
                {{ $book->title }}
            </a>
        </div>
    </div>
        <!-- <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 hover:bg-red-600 hover:text-white">X</button>
        </form> -->

    @endforeach
    @endif
</div>
<div class="shelf"></div>
<div class="shelf-depth"></div>
</div>


