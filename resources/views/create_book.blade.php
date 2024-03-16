@extends('layouts.app')

@section('content')
<div class="py-40 flex flex-col items-center w-screen">
    <h2 class="text-center text-5xl mb-10 font-light leading-tight text-black">Add New Book</h2>
    <form class="shadow-xl border-4 p-10 mx-auto w-1/3 bg-white" method="POST" action="{{ route('store_book') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-4 text-2xl mb-6">
            <input class="text-xl border-b-2 border-t-0 border-x-0 px-0 py-2" type="text" name="title" placeholder="Book Title" required>
        </div>
        <div class="flex flex-col gap-4 text-2xl mb-6">
            <textarea class="text-xl border-2 px-2 py-2" name="description" placeholder="Description" required></textarea>
        </div>
        <div class="flex flex-col gap-4 text-2xl mb-6">
            <input class="text-xl border-b-2 border-t-0 border-x-0 px-0 py-2" type="text" name="image" placeholder="Book Title" required>
        </div>
        <div class="flex justify-center mt-4">
            <button type="submit" class="px-20 py-2 bg-[#01A262] text-white text-2xl font-bold">Add Book</button>
        </div>
        <input type="hidden" name="genre_id" value="{{ $genre->id }}">

    </form>
</div>
@endsection
