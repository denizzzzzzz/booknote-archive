<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'book_id', 'title', 'content'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function category()
    {
        return $this->belongsTo(NoteCategory::class);
    }
}
