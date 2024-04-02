@extends('layouts.app')
@section('content')
<div class="library-banner text-center">
    <h1>My Library</h1>
</div>
<div>
    @livewire('manage-books')
</div>

@endsection