@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @php
                $readbook=false;  
                @endphp
                <div class="card-body">
                        <form action="{{route('read.books')}}" class="form-inline p-3" method="GET">
                                    @csrf
                                   
                            <div class="form-inline ">
                                <label for="List">List By:</label>
                                <select class="form-control ml-2" id="list" name="list">
                                    <option value="all">All</option>
                                    <option value="read">Read</option>
                                    <option value="notread">Not Read</option>
                                   
                                </select>
                                <button type="submit" class="btn btn-primary ml-2">Apply</button>
                                </div>

                        </form>

                        <table class="table border">
                                <thead class="thead-dark">
                                <tr>
                                <th>Id</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Edition</th>
                                    <th>Genre</th>
                                    <th>Marks As Read</th>
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
                                             @foreach ($reads as $read)
                                                 @if($book->id==$read->id)
                                                   @php 
                                                   $readbook=true;
                                                   break;

                                                   @endphp

                                                 
                                                 @else
                                                    @php 
                                                    $readbook=false;

                                                    @endphp

                                                 @endif

                                             @endforeach

                                             @if($readbook)
                                              <a href="#" class="btn btn-success">Read</a>
                                              @else
                                              <a href="{{route('books.read', $book->name)}}" class="btn btn-info">Mark as Read</a>
                                              @endif
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
