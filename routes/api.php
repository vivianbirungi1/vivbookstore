<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController as APIBookController;
use App\Http\Controllers\API\PublisherController as APIPublisherController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//creating a route group in middleware therefore we dont need to define middleware after each route
Route::middleware ('api')->group(function() {

  //GET /api/books - display all boooks
  Route::get('/books', [APIBookController::class, 'index']);

  //GET /api/books/$id - display a specific book
  Route::get('/books/{id}', [APIBookController::class, 'show']);

  //GET /api/publishers - display all publisherss
  Route::get('/publishers', [APIPublisherController::class, 'index']);

  //POST /api/books - add new book to db
  //PUT /api/books/$id - edit existing books
  //DELTE /api/books/$id - selete existing book

});
