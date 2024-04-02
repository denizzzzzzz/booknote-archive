<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Book extends Model
{
    protected static function booted()
    {
        static::created(function ($book) {
            if ($book->user_id) {
                $category = new NoteCategory();
                $category->title = 'Home'; 
                $category->book_id = $book->id;
                $category->user_id = $book->user_id; 
                $category->save();
            }
        });
    }
    

    use HasFactory;
    protected $fillable = ['title', 'description', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function categories()
    {
        return $this->hasMany(NoteCategory::class);
    }
}
