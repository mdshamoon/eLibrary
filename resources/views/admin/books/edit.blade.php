@extends('layouts.app')

@section('content')

<script src="//code.jquery.com/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/jquery.dropdown.min.css')}}" type="text/css">

<script src="{{asset('js/jquery.dropdown.min.js')}}"></script>
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

                    <div class="form-group demo">
                            <label for="sel1">Select Genre:</label>
                            <select class="form-control" style="display:none" id="genre" name="genre[]" multiple="multiple">
                                @foreach ($genre as $Genre)
                            <option value={{$Genre->id}}
                                @foreach($mygenres as $genrename)
                                @if($Genre->genre==$genrename->genre)
                                 selected
                                 @endif

                                @endforeach
                                
                                
                                >{{$Genre->genre}}</option>
                                @endforeach
                                
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


<script>
        $('.demo').dropdown({
            multipleMode:'label',
           
    
    });

    // @foreach($mygenres as $genre)

   
    // $('#genre option').filter(function()
    // {
        
    //     return this.value=="{{$genre->genre}}";
        
    //     }).prop("selected", true);
        
           
            
       
   
    // @endforeach

   
    
   

    </script>
@endsection