<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title','content','category_id', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function category()
    {
        return $this->belongsTo(NoteCategory::class);
    }
}
