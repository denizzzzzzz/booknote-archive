@extends('layouts.app')
@section('content')
<div class="home-banner text-center">
    <h1 class=" mb-12 font-light">Extremely <span class="underline">effective</span> <br> Booknote-organization</h1>
    <a href="/register">
        <button class="cta-button px-10 py-2">
            Get Organized Today
        </button>
    </a>
</div>

<div class="video-loop">
    <video autoplay muted loop class="w-full h-auto">
        <source src="{{ asset('img/video-example.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<div class="py-20 md:py-40 bg-[#252525] text-white">
    <div class="flex flex-col items-center w-2/3 mx-auto md:flex-row justify-between gap-10">
        <div class="flex flex-col gap-5 md:gap-10">
            <img class="w-10 md:w-20 mx-auto" src="{{ asset('img/quick-icon.svg') }}" />
            <h2>Quick</h2>
        </div>
        <div class="flex flex-col gap-5 md:gap-10">
            <img class="w-10 md:w-20 mx-auto" src="{{ asset('img/easy-icon.svg') }}" />
            <h2>Easy</h2>
        </div>
        <div class="flex flex-col gap-5 md:gap-10">
            <img class="w-10 md:w-20 mx-auto" src="{{ asset('img/free-icon.svg') }}" />
            <h2>Free</h2>
        </div>
    </div>
</div>
<div class="my-20 md:my-40 text-black w-2/4 md:w-10/12 mx-auto">
    <h2 class="text-center mb-10">What Our Users Say</h2>
    <div class="flex flex-col items-top md:flex-row md:justify-between mb-20 gap-10 italic ">
        <p>"This tool revolutionized how I manage my reading notes.
            I can easily access insights from any book, anytime,
            anywhere. A game-changer for avid readers!"</p>
        <p>
            "Absolutely love the organization and simplicity.
            Finding specific notes is now effortless,
            and the genre-based bookshelves are a neat feature."
        </p>

        <p>
            "I'm no longer lost in my scribbles.
            This archive makes my notes readable and accessible.
            It's my go-to for revisiting book insights."
        </p>
    </div>
    <div class="text-center text-2xl md:text-3xl text-white">
        <a>
            <button class="px-10 md:px-20 py-1 md:py-2 font-light border-2 border-[#252525] bg-[#01A262]">
                Get Organized Today
            </button>
        </a>
    </div>
</div>

@endsection