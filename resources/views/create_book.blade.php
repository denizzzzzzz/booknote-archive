@extends('layouts.app')

@section('content')
<div class=" flex flex-col items-center w-screen">
    <div class="home-banner py-28">
        <div class="flex flex-row justify-center text-2xl">
            <h1 class="text-center text-6xl mb-4 font-light leading-tight text-white">Add to your <span class="text-[#01A262]">{{$genre->title}}</span> Collection</h1>
        </div>
    </div>
    @livewire('book-form', ['genreId' => $genre->id])
</div>
@endsection