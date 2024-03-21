@extends('layouts.app')

@section('content')

<div class="library-banner pt-40">
    <h1 class="text-center text-7xl mb-10 font-light leading-tight">My Library</h1>
    <div class="bg-[#252525c7] flex justify-center p-10">
        <button onclick="AddGenre.showModal()" class="px-20 py-2 bg-white text-black flex justify-between items-center text-2xl font-bold mb-4">
            New Closet <i class="fa-solid fa-plus pl-4"></i>
        </button>
    </div>
</div>

<dialog id="AddGenre" class="modal" x-data="{ open: false }" @close="open = false">
    <div class="modal-box relative">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="AddGenre.close()">✕</button>
        <h3 class="font-bold text-white text-2xl mb-6 text-center">Select the bookgenre you want to add</h3>
        @livewire('select-book-genre')
    </div>
</dialog>
</div>

<div class="mx-auto pt-20 pb-40">
    @livewire('show-book-genres', ['userId' => Auth::user()->id])
</div>

@endsection