<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Review, Book};

class BookController extends Controller
{
    public function get_books() {
        $books = Book::all();
        return response()->json([
            'data' => $books
        ], 200);
    }
    public function book_details($book_id) {
        $book = Book::where('id', $book_id)->first();
        return response()->json([
            'book' => $book
        ], 200);
    }
    public function add_book(Request $request) {

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'release' => $request->release,
            'description' => $request->description
        ]);
        
        return response()->json([
            'book_id' => $book->id
        ]);
    }
    public function add_book_image(Request $request, $book_id) {

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $imageLocation = '/assets/media/book';
        $imageNames = $imageLocation.'/'.$imageName;
        $image->move(public_path($imageLocation), $imageName);

        $book = Book::where('id', $book_id)->update([
            'image' => $imageNames
        ]);
        
        return response()->json([
            'image' => $imageNames
        ]);
    }
}
