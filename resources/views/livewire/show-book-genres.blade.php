<div>
    <div>
        <div class="grid grid-cols-2 gap-10">
            @foreach($bookGenres as $genre)
            <div class="flex flex-col g text-center">
                <h3 class="text-4xl bg-[#01A262] p-4 text-white mb-10"><span onclick="confirmDelete({{ $genre->id }})" class="px-4 py-2 text-right text-color rounded pointer-events-auto">x</span> {{ $genre->title }}</h3>
                <div class="closet-depth">

                </div>
                <div class="closet">
                    <div class="door-left">
                        <div class="knob-left"></div>
                    </div>
                    <div class="door-right">
                        <div class="knob-right"></div>
                    </div>
                    @livewire('show-books', ['genreId' => $genre->id])
                    <div class="">
                        <a href="{{ route('create_book', ['genreId' => $genre->id]) }}">
                            <button class="text-base absolute bottom-4 left-5 z-10 w-11/12 font-bold bg-[#01A262] text-white py-2 px-10 border-2 border-b-2">New Book +</button>
                        </a>
                    </div>
                </div>
                <div class="flex justify-between">
                <div class="h-10 bg-[#2E251A] w-32">
                    
                    </div>
                    <div class="h-10 bg-[#2E251A] w-32">
                        
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