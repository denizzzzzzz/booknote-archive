@extends('layouts.app')

@section('content')
<div class="notes-banner text-center">
  <h1>{{ $book->title }}</h1>
  <h2>{{$book->description}}</h2>
</div>
<div class="mx-auto">

  <div class=" mb-32">
    @livewire('manage-notes', ['bookId' => $book->id])
  </div>
</div>

@endsection