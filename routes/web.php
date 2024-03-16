<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/library', function () {
    $user = Auth::user(); 
    return view('library', compact('user'));
})->middleware(['auth', 'verified'])->name('library');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/new-book/{genreId}', [BookController::class, 'create'])->name('create_book');
    Route::post('/books', [BookController::class, 'store'])->name('store_book');
});

require __DIR__.'/auth.php';
