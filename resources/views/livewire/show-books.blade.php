<div class="books gap-0 items-center justify-items-center">
    @php

    $groupedBooks = $books->sortBy('title')->groupBy(function($item) {
    return strtoupper(substr($item->title, 0, 1));
    });
    @endphp

    @foreach($groupedBooks as $letter => $booksByLetter)

    @foreach($booksByLetter as $book)
    <h4 class="book text-base font-bold "><span class="text-[#01A262]">{{ $letter }} </span>{{ $book->title }}</h4>
    @endforeach
    @endforeach
</div>