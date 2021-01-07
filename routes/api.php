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

  //POST /api/books - add new book to db
  Route::post('/books', [APIBookController::class, 'store']);

  //PUT /api/books - add new book to db
  Route::put('/books/{id}', [APIBookController::class, 'update']);

  //DELTE /api/books/$id - delete existing book
  Route::delete('/books/{id}', [APIBookController::class, 'destroy']);

  //GET /api/publishers - display all publishers
  Route::get('/publishers', [APIPublisherController::class, 'index']);


});
