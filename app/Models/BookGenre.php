<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{

    protected $fillable = ['title'];

    public function books()
    {
        return $this->hasMany(Book::class, 'genre_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_book_genres');
    }
}
