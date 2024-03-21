<div>
    @foreach($bookGenres as $genre)
    <h3 class="text-4xl text-center p-4 text-black "> {{ $genre->title }}</h3>
    <div class="genre-container p-10 ">
    <span onclick="confirmDelete({{ $genre->id }})" class="absolute top-0 right-0 mt-4 mr-4 px-4 py-2 text-color rounded pointer-events-auto cursor-pointer">x</span>
        @livewire('show-books', ['genreId' => $genre->id])
        <div class="w-full flex justify-center mt-16">
        <a href="{{ route('create_book', ['genreId' => $genre->id]) }}">
            <button class="px-20 py-2 bg-white text-black flex justify-between items-center text-2xl font-bold mb-4">
                Add book <i class="fa-solid fa-plus pl-4"></i>
            </button>
        </a>
        </div>
    </div>
    @endforeach
</div>

<script>
    function confirmDelete(genreId) {
        if (confirm('Are you sure you want to delete this genre?')) {
            @this.call('deleteGenre', genreId);
        }
    }
</script>