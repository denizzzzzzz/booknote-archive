@extends('layouts.app')

@section('content')
<div class="home-banner py-20">
    <h1 class="text-center text-7xl mb-10 font-light leading-tight">{{ Auth::user()->name }}'s Library</h1>
    <div class="flex flex-row justify-center text-2xl">
        <div x-data="{ open: false }">
            <button @click="open = true" class="cta-button start-organizing border-4 px-20 py-2 font-bold">New Closet</button>

            <div x-show="open" style="display: none; background-color: rgba(0, 0, 0, .5);" class="fixed top-0 left-0 w-full h-full flex items-center justify-center">
                <div class="relative bg-white p-4">
                    <button @click="open = false" class="absolute top-0 right-0 mt-2 mr-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg">
                        X
                    </button>

                    @livewire('select-book-genre')
                    <button @click="open = false">Close</button>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="w-2/3 mx-auto pt-20 pb-40">
    @if (session('success'))
    <div class="bg-green-100 border mb-10 border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
    {{ session('success') }}
</div>

    @endif
    @livewire('show-book-genres', ['userId' => Auth::user()->id])
    </div>
    <div class="border-4 w-2/3 mx-auto mb-60">
        <div class="text-center m-60">
        <h2 class="text-6xl mb-10" >New Closet</h2>
        <h4 class="text-7xl py-6 px-4 w-32  m-auto bg-black text-white">+</h4>
        </div>
    </div>

@endsection 