<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Review};

class ReviewController extends Controller
{
    public function get_review() {
        $reviews = Review::join('books', 'books.id', '=', 'reviews.book_id')
                        ->get();

        return response()->json([
            'review' => $reviews
        ], 200);
    }
    public function book_review($book_id) {
        $review = Review::where('book_id', $book_id)
                        ->join('users', 'users.id', '=', 'reviews.user_id')
                        ->get();

        return response()->json([
            'review' => $review
        ], 200);
    }
    public function add_review( Request $request,$book_id) {
        $review = Review::create([
            'book_id' => $book_id,
            'review' => $request->review,
            'time' => now(),
        ]);

        return response()->json([
            'Review berhasil ditambahkan'
        ]);
    }
}
