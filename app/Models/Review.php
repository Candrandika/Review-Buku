<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'review', 'time'];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function book() {
        $this->belongsTo(Book::class);
    }
}
