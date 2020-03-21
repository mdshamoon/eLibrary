@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
            <div class="col-md-4 m-3">
            <a href="{{route('admin.books.create')}}" class="btn btn-primary">Add a New Book</a>
            </div>
                  
                   
                   
          

                    <table class="table border">
                        <thead class="thead-dark">
                        <tr>
                        <th>Id</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Genre</th>
                            <th>Functions</th>
                        </tr>
                        </thead>
                        <tbody>

                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->edition }}</td>
                                    <td>{{ $book->genre }}</td>
                                    <td>
                                    <a href="{{ route('admin.books.edit', $book->id) }}" > <button type="button" class="float-left btn btn-warning">Edit</button></a>
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="ml-2 float-left" >
                                    @csrf
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                     </form>
                                    </td>
                                </tr>
                                @endforeach
                       
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
