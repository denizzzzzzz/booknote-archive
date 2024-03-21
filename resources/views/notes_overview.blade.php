@extends('layouts.app')

@section('content')
<div class="home-banner pt-32">
<h1 class="text-center text-7xl mb-10 font-light leading-tight">{{ $book->title }} - Notes</h1>
  <div class="bg-[#2525253e] flex justify-center p-10">
    <div class="flex gap-6">
      <input class="w-80 text-xl" placeholder="Search your notes..." type="text" name="search" id="search" />
      <button class="bg-white px-4 py-1 text-black text-xl font-bold uppercase">Search</button>
    </div>
  </div>
</div>
<div>

  <div class="notes-container p-10 ">
    <div class="text-center">
      <button onclick="addNote.showModal()" class="px-20 py-2 bg-[#01A262] text-white text-2xl font-bold text-center mb-4">Add Notes</button>
    </div>

    <div class="divider mb-6"></div>
    <div class="grid grid-cols-4 gap-4">
      @foreach($notes as $note)

      <details class="collapse rounded-none">
        <summary class="collapse-title text-xl font-medium bg-white text-black ">{{$note->title}} </i></summary>
        <div class="collapse-content bg-white text-black flex justify-between">
          <div>{!! $note->content !!} </div>
        </div>
        <div class="flex gap-6 items-center justify-end bg-black  py-4 px-6">
          <form action="{{ route('destroy_notes', $note->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="fa-solid fa-xmark text-white" type="submit"></button>
          </form>
          <i class="fa-solid fa-pencil text-white"></i>
        </div>
      </details>

      @endforeach

    </div>

    <div>
      <dialog id="addNote" class="modal" x-data="{ open: false }" @close="open = false">
        <div class="modal-box relative bg-[#252525] max-w-2/3 h-auto">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="addNote.close()">✕</button>

          <form class="p-8 w-full" action="{{ route('notes.store') }}" method="POST">


            @csrf

            <h3 class="text-white text-2xl mb-6">Note Title </h3>
            <label class="input flex items-center gap-2 mb-10 bg-white  rounded-none">
              <input type="text" class="grow border-none text-2xl text-black" name="title" placeholder="Note Title" />
            </label>

            <h3 class="text-white text-2xl mb-6">Convert Handwritten Notes</h3>

            @livewire('convert-handwriting')

            <input type="hidden" name="book_id" value="{{ $book->id }}">

            <button type="submit" class="px-20 py-2 bg-[#01A262] text-white text-2xl font-bold w-full">Save Note</button>
          </form>

        </div>
      </dialog>

    </div>

  </div>


  @endsection