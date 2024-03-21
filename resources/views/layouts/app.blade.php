<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <title>Booknote Archive</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@include('layouts.header')
<script src="{{ asset('js/headerScroll.js') }}"></script>

<body>
    <main>
        @yield('content')
    </main>

</body>
@include('layouts.footer')

</html>