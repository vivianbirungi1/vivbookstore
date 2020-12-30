<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;

use Storage;

class BookController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');//only allows check of one role .
      //after modifying AuthRole you can now add a whole list

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('admin.books.index', [
          'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $publishers = Publisher::all();
        return view('admin.books.create', [
          'publishers' => $publishers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
          'title' => 'required|max:191',
          'author' => 'required|max:191',
          'publisher_id' => 'required',
          'cover' => 'file|image',
          'year' => 'required|integer|min:1900',
          'isbn' => 'required|alpha_num|size:13|unique:books,isbn',
          'price' => 'required|numeric|min:0'
        ]);

        $book = new Book();

        if($request->hasFile('cover'))
        {
          $cover= $request->file('cover');
          $extension = $cover->getClientOriginalExtension();
          $filename = date('Y-m-d-His') . '_' . $request->input('isbn') . '.' . $extension;

          $path = $cover->storeAs('public/covers', $filename);
          $book->cover = $filename;
       }

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher_id = $request->input('publisher_id');
        $book->year = $request->input('year');
        $book->isbn = $request->input('isbn');
        $book->price = $request->input('price');
        $book->save();

        $request->session()->flash('success', 'Book added successfully!');

        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
         $book = Book::findOrFail($id);

         return view('admin.books.show', [
           'book' => $book
         ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $book = Book::findOrFail($id);
      $publishers = Publisher::all();

      return view('admin.books.edit', [
        'book' => $book,
        'publishers' => $publishers
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $request ->validate([
        'title' => 'required|max:191',
        'author' => 'required|max:191',
        'publisher_id' => 'required',
      //  'cover' => 'file|image|dimensions:width=300,height=400',
        'year' => 'required|integer|min:1900',
        'isbn' => 'required|alpha_num|size:13|unique:books,isbn,' . $id,
        'price' => 'required|numeric|min:0'
      ]);

      $book = Book::findOrFail($id);

      if($request->hasFile('cover'))
      {
        $cover= $request->file('cover');
        $extension = $cover->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('isbn') . '.' . $extension;

        $path = $cover->storeAs('public/covers', $filename);
        $book->cover = $filename;
     }

      $book->title = $request->input('title');
      $book->author = $request->input('author');
      $book->publisher_id = $request->input('publisher_id');
      $book->year = $request->input('year');
      $book->isbn = $request->input('isbn');
      $book->price = $request->input('price');
      $book->save();

      $request->session()->flash('info', 'Book edited successfully!');

      return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        Storage::delete("public/covers/{$book->cover}");
        $book->delete();

        $request->session()->flash('danger', 'Book deleted successfully!');

        return redirect()->route('admin.books.index');
    }
}
