<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'publisher', 'author', 'release', 'description'];

    public function review() {
        $this->hasMany(Review::class);
    }
}
