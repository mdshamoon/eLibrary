@extends('layouts.app')

@section('content')
<script src="//code.jquery.com/jquery.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/jquery.dropdown.min.css')}}" type="text/css">
<script src="{{asset('js/jquery.dropdown.min.js')}}"></script>


<div class="container">
         
        <div class="form-inline p-3">
                <label for="List">List By:</label>
                <select class="form-control ml-2" id="list" name="list">
                    <option value="all">All</option>
                    <option value="read">Read</option>
                    <option value="notread">Not Read</option>
                   
                </select>

                <form class="ml-2" action="{{ route('home') }}">Filters:
                     <div class="demo" style="display: inline-block">
                        <select class="form-control" style="display:none" id="genre" name="genre[]" multiple="multiple" value="">
                                @foreach ($genre as $Genre)
                            <option value={{$Genre->id}}

                                    @foreach($mygenres as $genrename)
                                    @if($Genre->id==$genrename)
                                     selected
                                     @endif
    
                                    @endforeach
                                    
                                
                                
                                
                                
                                
                                >{{$Genre->genre}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <span><button type="submit" class="btn btn-primary">Search</button></span>
                </form>
               
                </div>
        <div class="row">

                @foreach($books as $book)
        
        
                <div class="col-xs-12 col-sm-6 col-md-3" id="{{$book->id}}">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{asset('images/cover/'.$book->cover)}}" alt="card image"></p>
                                        <h4 class="card-title">{{$book->name}}</h4>
                                    <p class="card-text">Author: {{$book->author}}</p>
                                    <p class="card-text">Genre: {{$book->genre}}</p>
                                    <p class="card-text">Edition: {{$book->edition}}</p>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center">
                                    <h4 class="card-title m-4">Have you read this book: </h4>
                                        <p class="card-text">

                                                @if($book->user_id!=null)
                                                
                                                <br />
                                                <a href="#"  ><i class="fa fa-check fa-4x"></i></a>
                                                @else
                                                <i class="fa fa-close fa-4x text-danger"></i>
                                                <br>
                                                <a href="{{route('books.read', $book->name)}}" class="btn" style="background-color: aqua"> Mark As Read</a>
                                                @endif
                                        </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @php
                $readbook=false;  
                @endphp
                <div class="card-body">
                       
                                   
                            <div class="form-inline p-3">
                                <label for="List">List By:</label>
                                <select class="form-control ml-2" id="list" name="list">
                                    <option value="all">All</option>
                                    <option value="read">Read</option>
                                    <option value="notread">Not Read</option>
                                   
                                </select>
                               
                                </div>

                      

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
                                        
                                        <tr id="{{$book->id}}">
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->edition }}</td>
                                            <td>{{ $book->genre }}</td>
                                            <td>
                                         

                                             @if($book->user_id!=null)
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
    </div> --}}
</div>

<script>

    
$('.demo').dropdown({
        multipleMode:'label'

});

var book=@json($books);
    $('#list').change(function(){
        var option = $(this).children("option:selected").val();
        if(option=="read")
        $.each(book, function(i, item) {
    if(item.user_id==null)
    $('#'+item.id).css("display","none");
    else
    $('#'+item.id).css("display","table-row");
});

   else if(option=="notread")
    $.each(book, function(i, item) {
    if(item.user_id!=null)
    $('#'+item.id).css("display","none");
    else
    $('#'+item.id).css("display","table-row");

    });

    else if(option=="all")
    $.each(book, function(i, item) {
    
    $('#'+item.id).css("display","table-row");
    
    });

});


   


    </script>

@endsection
