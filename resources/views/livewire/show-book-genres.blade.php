<div>
    <div>
        <div class="grid grid-cols-2 gap-10">
            @foreach($bookGenres as $genre)
            <div class="flex flex-col gap-10 text-center">
                <h3 class="text-4xl bg-[#01A262] p-4 text-white"><span onclick="confirmDelete({{ $genre->id }})" class="px-4 py-2 text-right text-color rounded pointer-events-auto">x</span> {{ $genre->title }}</h3>
                <div class="closet">
                    @livewire('show-books', ['genreId' => $genre->id])
                    <div class="">
                        <a href="{{ route('create_book', ['genreId' => $genre->id]) }}">
                            <button class="text-base font-bold bg-[#01A262] text-white py-2 px-10 border-t-2 border-b-2">New Book +</button>
                        </a>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function confirmDelete(genreId) {
        if (confirm('Are you sure you want to delete this genre?')) {
            @this.call('deleteGenre', genreId);
        }
    }
</script>