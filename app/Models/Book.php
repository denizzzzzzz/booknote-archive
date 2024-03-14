<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'image', 'user_id', 'genre_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
}
