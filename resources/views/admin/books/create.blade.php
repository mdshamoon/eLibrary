@extends('layouts.app')

@section('content')

<script src="//code.jquery.com/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/jquery.dropdown.min.css')}}" type="text/css">

<script src="{{asset('js/jquery.dropdown.min.js')}}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border border-dark">
                
              
                 <form action="{{route('admin.books.store')}}" class="m-4" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="Author">Author:</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter Author's name" id="authorName">
                    </div>

                    <div class="form-group">
                        <label for="Edition">Edition:</label>
                        <input type="number" name="edition" class="form-control" placeholder="Enter Edition" id="edition">
                    </div>

                    <div class="form-group demo">
                        <label for="sel1">Select Genre:</label>
                        <select class="form-control" style="display:none" id="genre" name="genre[]" multiple="multiple" value="['Fantasy']">
                            @foreach ($genre as $Genre)
                        <option value={{$Genre->id}}>{{$Genre->genre}}</option>
                            @endforeach
                            
                        </select>
                        </div>



                       
                        
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>    
                   
                   
          
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.demo').dropdown({
        multipleMode:'label'

});

    </script>

@endsection