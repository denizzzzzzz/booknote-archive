<div>
    @if($bookGenres->isNotEmpty())
        <div class="grid grid-cols-3 gap-4 mb-10">
            @foreach($bookGenres as $genre)
                <button wire:click="selectGenre({{ $genre->id }})" 
                        class="{{ $selectedGenre == $genre->id ? 'bg-[#01A262] text-white' : 'bg-white text-black' }} p-2">
                    {{ $genre->title }}
                </button>
            @endforeach
        </div>
        <div class="flex justify-center w-full mx-auto">
            <button wire:click="confirmSelection" class="px-20 py-2 bg-white text-black flex justify-between items-center text-2xl font-bold mb-4">
                Add New Closet <i class="fa-solid fa-plus pl-4"></i>
            </button>
        </div>
    @else
        <p>No book genres available.</p>
    @endif
</div>
