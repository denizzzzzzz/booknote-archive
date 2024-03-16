@extends('layouts.app')

@section('content')
<div class="py-40 flex flex-col justify-center  w-screen">
    <h1 class="text-center text-7xl mb-24 font-light leading-tight text-black">Welkome Back Boss!</h1>
    <form class="shadow-xl border-4 p-10 mx-auto w-1/3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex flex-col gap-2 text-2xl mb-10">
            <label>Email</label>
            <input class="text-2xl border-b-2 border-t-0 border-x-0 px-0" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-2 text-2xl">
            <label>Password</label>
            <input class="text-2xl border-b-2 border-t-0 border-x-0 px-0" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4 mb-10">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-1xl text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 gap-10">
            @if (Route::has('password.request'))
            <a class="underline"  href="{{ route('password.request') }}">  {{ __('Forgot your password?') }}</a>
            @endif
            <button class="px-20 py-2 bg-[#01A262] text-white text-2xl font-bold">     {{ __('Log in') }}</button>
        </div>
    </form>
</div>
@endsection