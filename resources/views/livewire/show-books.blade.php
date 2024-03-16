<div class="books gap-0 items-center justify-items-center pt-10 mb-20">
    @foreach($books as $index => $book)
    @php
    $title = $book->title;
    $maxLength = 24;
    $trimmedTitle = mb_strlen($title) > $maxLength ? mb_substr($title, 0, $maxLength-3) . '...' : $title;
    @endphp
    <h4 class="book text-base font-bold">{{ $trimmedTitle }}</h4>
    @if($loop->iteration % 8 === 0 && !$loop->last)
    <div class="spacer"></div>
    <div class="spacer"></div>
    @endif
    @endforeach
    {{ $books->links() }}
    <style>
        .spacer {
            flex: 1;
            height: 40px;
        }
    </style>
</div>