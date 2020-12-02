<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\Admin\BookController as AdminBookController;


use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');

Route::get('/user/books', [UserBookController::class, 'index'])->name('user.books.index');
Route::get('/user/books/{id}', [UserBookController::class, 'show'])->name('user.books.show');

//CRUD for books
Route::get('/admin/books', [AdminBookController::class, 'index'])->name('admin.books.index');
Route::get('/admin/books/create', [AdminBookController::class, 'create'])->name('admin.books.create');
Route::get('/admin/books/{id}', [AdminBookController::class, 'show'])->name('admin.books.show');
Route::post('/admin/books/store', [AdminBookController::class, 'store'])->name('admin.books.store');
Route::get('/admin/books/{id}/edit', [AdminBookController::class, 'edit'])->name('admin.books.edit');
Route::put('/admin/books/{id}', [AdminBookController::class, 'update'])->name('admin.books.update');
Route::delete('/admin/books/{id}', [AdminBookController::class, 'destroy'])->name('admin.books.destroy');

//ADMIN REVIEWS ROUTES
Route::delete('/admin/books/{id}/reviews/{rid}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');

//USER REVIEWS routes
Route::get('/user/books/{id}/reviews/create', [UserReviewController::class, 'create'])->name('user.reviews.create');
Route::post('/user/books/{id}/reviews/store', [UserReviewController::class, 'store'])->name('user.reviews.store');
