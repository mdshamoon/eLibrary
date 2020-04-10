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
    </div>
</div>
<script src="//code.jquery.com/jquery.min.js"></script>
<script>
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
