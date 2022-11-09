<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ BookController, ReviewController, AuthController };

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//book & review
Route::get('/books', [BookController::class, 'get_books']);
Route::post('/book/add', [BookController::class, 'add_book']);
Route::post('/book/image/{book_id}', [BookController::class, 'add_book_image']);
Route::get('/book/{book_id}', [BookController::class, 'book_details']);
Route::get('/reviews', [ReviewController::class, 'get_review']);
Route::get('/review/{book_id}', [ReviewController::class, 'book_review']);
Route::post('/review/{book_id}', [ReviewController::class, 'add_review']);

//auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/auth', [AuthController::class, 'check_auth']);