@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Book {{ $book->title }}
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>
                            <tr>
                              <td>Title</td>
                              <td>{{ $book->title }}</td>
                            </tr>
                            <tr>
                              <td>Author</td>
                              <td>{{ $book->author }}</td>
                            </tr>
                            <tr>
                              <td>Publisher</td>
                              <td>{{ $book->publisher }}</td>
                            </tr>
                            <tr>
                              <td>Year</td>
                              <td>{{ $book->year }}</td>
                            </tr>
                            <tr>
                              <td>ISBN</td>
                              <td>{{ $book->isbn }}</td>
                            </tr>
                            <tr>
                              <td>Price</td>
                              <td>{{ $book->price }}</td>
                            </tr>
                        </tbody>
                      </table>
                    <a href="{{ route('admin.books.index')}}" class="btn ">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
