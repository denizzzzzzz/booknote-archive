<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ImageRecognitionController;
use App\Http\Controllers\NotesController;
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
    Route::get('/new-book/{genreId}', [BookController::class, 'index'])->name('create_book');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/book/{id}/notes',  [NotesController::class, 'index'])->name('show_notes');
});

Route::delete('/books/notes/{note}', [NotesController::class,'destroy'])->name('destroy_notes');

Route::post('/upload-image', [ImageRecognitionController::class, 'upload'])->name('upload-image');
Route::get('/upload-form', function () {
    return view('image-upload');
})->name('upload-form');

Route::post('/store-note', [NotesController::class, 'store'])->name('notes.store');


require __DIR__.'/auth.php';
