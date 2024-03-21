@extends('layouts.app')


@section('content')
<div class="home-banner py-80">
    <h1 class="text-center text-7xl mb-24 font-light leading-tight">Extremely <span class="underline">effective</span> <br> Booknote-organization</h1>

    <div class="flex flex-row gap-12 justify-center text-2xl">
        <a href="#tutorial">
            <button class="cta-button tutorial border-4 px-20 py-2 text-[#01A262] border-[#01A262] font-bold">
                Watch tutorial
            </button>
        </a>

        <a href="/register">
            <button class="cta-button start-organizing border-4 px-20 py-2 font-bold">
                Start organizing
            </button>
        </a>
    </div>
</div>


<div class="video-loop">
    <video autoplay muted loop style="max-width: 100%; height: auto;">
        <source src="{{ asset('img/video-example.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<div class="py-40 bg-[#01A262] text-white">
    <div class="flex flex-row justify-center gap-80 text-5xl">
        <div class="flex flex-col gap-10">
            <img class="w-20 mx-auto" src="{{ asset('img/quick-icon.svg') }}" />
            <h2>Quick</h2>
        </div>
        <div class="flex flex-col gap-10">
            <img class="w-20 mx-auto" src="{{ asset('img/easy-icon.svg') }}" />
            <h2>Easy</h2>
        </div>
        <div class="flex flex-col gap-10">
            <img class="w-20 mx-auto" src="{{ asset('img/free-icon.svg') }}" />
            <h2>Free</h2>
        </div>
    </div>
</div>
<div class="my-40">
    <h2 class="text-5xl text-center mb-20">What Our Users Say</h2>
    <div class="md:flex gap-20 w-3/4 mx-auto text-2xl italic mb-20">
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
    <div class="text-center text-3xl text-white">
        <a>
            <button class="px-20 py-2 font-bold bg-[#01A262]">
                Get Organized
            </button>
        </a>
    </div>
</div>


@endsection