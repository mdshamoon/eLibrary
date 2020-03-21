@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border border-dark">
                
              
                 <form action="{{route('admin.books.update',$book->id)}}" class="m-4" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Name">Name:</label>
                    <input type="text" class="form-control" value="{{$book->name}}" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="Author">Author:</label>
                        <input type="text" name="author" class="form-control" value="{{$book->author}}" id="authorName">
                    </div>

                    <div class="form-group">
                        <label for="Edition">Edition:</label>
                        <input type="number" name="edition" class="form-control" value="{{$book->edition}}" id="edition">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Select Genre:</label>
                        <select class="form-control" id="genre" name="genre" value={{$book->genre}}>
                            <option value="comedy">Comedy</option>
                            <option value="romance">Romance</option>
                            <option value="horror">Horror</option>
                            <option value="fiction">Fiction</option>
                        </select>
                        </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>    
                   
                   
          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection