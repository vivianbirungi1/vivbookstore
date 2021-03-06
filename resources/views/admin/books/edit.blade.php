@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Edit book
       </div>

       <div class="card-body">
         @if($errors->any())
             <div class="alert alert-danger">
               <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
               </ul>
             </div>
         @endif
        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <img src="{{ asset('storage/covers/' . $book->cover ) }}" width="150" />
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control" name="cover" id="cover" />
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $book->title) }}" />
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ old('author', $book->author) }}" />
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <select name="publisher_id">
                      @foreach ($publishers as $publisher)
                        <option value = " {{ $publisher->id }}" {{ (old('publisher_id', $book->publisher->id) == $publisher->id) ? "selected" : "" }} >{{ $publisher->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" class="form-control" name="year" id="year" value="{{ old('year', $book->year) }}" />
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}" />
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $book->price) }}" />
                </div>
                <div>
                  <a href="{{ route('admin.books.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection
