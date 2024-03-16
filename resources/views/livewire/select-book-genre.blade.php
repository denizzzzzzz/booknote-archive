<div>
    @if($bookGenres->isNotEmpty())
        <div class="grid grid-cols-3 gap-4">
            @foreach($bookGenres as $genre)
                <button wire:click="selectGenre({{ $genre->id }})" class="{{ $selectedGenre == $genre->id ? 'bg-blue-500' : 'bg-gray-200' }} p-2">
                    {{ $genre->title }}
                </button>
            @endforeach
        </div>
        <button class="bg-green-500 p-2 mt-4" wire:click="confirmSelection">Confirm</button>
    @else
        <p>No book genres available.</p>
    @endif
</div>
