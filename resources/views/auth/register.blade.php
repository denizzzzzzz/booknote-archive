@extends('layouts.app')

@section('content')
<div class="py-40 flex flex-col justify-center  w-screen">
    <h1 class="text-center text-7xl mb-24 font-light leading-tight text-black">Let's get it started in here!</h1>
    <form class="shadow-xl border-4 p-10 w-auto m-4 md:mx-auto md:w-1/3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col gap-2 text-2xl">
            <label>Name</label>
            <input class="text-2xl border-b-2 border-t-0 border-x-0 px-0" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class=" mt-4 flex flex-col gap-2 text-2xl">
            <label>Email</label>
            <input  class="text-2xl border-b-2 border-t-0 border-x-0 px-0" class="bg-white" id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>


        <div class=" mt-4 flex flex-col gap-2 text-2xl">
            <label>Password</label>
            <input class="text-2xl border-b-2 border-t-0 border-x-0 px-0" id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class=" mt-4 mb-20 flex flex-col gap-2 text-2xl">
            <label>Confirm Password</label>
            <input  class="text-2xl border-b-2 border-t-0 border-x-0 px-0" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div class=" mt-4 flex flex-col gap-6">

            <button class="px-20 py-2 bg-[#01A262] text-white text-2xl font-bold">{{ __('Register') }}</button>
            <a class="underline" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
        </div>
    </form>
</div>

@endsection