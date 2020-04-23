@extends('layouts.user')

@section('content')
<script src="//code.jquery.com/jquery.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">





<div class="container">
         
        
            <div class="row pb-3">
                  <div class="col-md-3">
                      <div class="form-inline">
                <label for="List ">List By:</label>
                <select class="form-control mx-2" id="list" name="list">
                    <option value="all">All</option>
                    <option value="read">Read</option>
                    <option value="notread">Not Read</option>
                   
                </select>
                    </div>
                </div>
                    <div class="col-md-8 ">
                        <div class="">
                <form  action="{{ route('home') }}" class="form-inline mt-md-0 mt-2"> 
                     
                            <label for="List ">Category: </label>
                        <select class="form-control mx-2"  id="genre" name="genre[]"  value="">
                            <option value="all">All</option>
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
                     
                        <div class="m-auto m-md-0"><button type="submit" class="mt-md-0 mt-2  btn btn-primary">Search</button></div>
                    
                    </form>
                </div>
            </div>
            </div>
               
                
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                        <h6 class="h4 m-0 font-weight-bold text-primary">Books</h6>
                      </div>
                      <div class="card-body">
               
      
               
                    {{-- <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside"> --}}

                                    <table id="dataTablecards" style="width:100%">
                                           <thead>
                                               <th></th>
                                               <th>name</th>
                                           </thead>
                                            <tbody class="row" id="tbody">
                                                    
                                                    @foreach($books as $book)
                                                    
                                                    <tr class="col-xs-3 col-sm-6 col-md-3" id="{{$book->id}}">
                                                      <td class="d-block"> <div class="card mb-4 shadow" style="min-height: 420px;">
                                                            <div class="card-body text-center position-relative" style="border:none">
                                                            <p><img class=" img-fluid" src="{{asset('images/cover/'.$book->cover)}}" alt="card image" style="max-height: 200px"></p>
                                                                <h6 class="text-dark font-weight-bold">{{(strlen($book->name) > 22) ? substr($book->name,0,20).'..' : $book->name}}</h6>
                                                                <hr class="sidebar-divider">
                                                            <p class="card-text m-0 text-left ml-2  " style="font-size:0.9rem"><strong>Author:</strong> {{$book->author}}</p>
                                                            <p class="card-text text-left ml-2" style="font-size:0.9rem"><strong>Genre:</strong> {{(strlen($book->genre) > 30) ? substr($book->genre,0,35).'...' : $book->genre}}</p>
                                                            <span class="badge badge-primary"></span>
                                                            @if($book->user_id!=null)
                                                            <a href="javascript:void(0)" class="badge badge-success marking position-absolute readBook">
                                                                    <i class="fa fa-check"></i> You have read this book</a>
                                                            @else
                                                            <a href="javascript:void(0)"  class="badge badge-primary position-absolute marking bookNotRead" data-item="{{route('books.read', $book->name)}}">
                                                                   Click to mark the book as read</a>
                                                            @endif
                                                           
                                                               
                                                            </div>
                                                        </div>
                                                    </td>
     
                                                       <td>{{$book->name}}</td>

                                                        
                                                     
                                                    </tr>
                                               
                                                   
                                                    

                                                    @endforeach
                                               
                                                  </tbody>
                                                </table>

                                            </div>
                        </div>
                               
                            {{-- </div>
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
                    </div> --}}
                

             
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



$('.bookNotRead').click(function(mybutton){
  $.ajax({url: $(this).attr('data-item'), success: function(result){
   
      $(mybutton.target).addClass('badge-success').removeClass('bookNotRead').html('<i class="fa fa-check"></i> You have read this book')
   
  },
  error: function(result){
  console.log(result);
  }
  
  });
});
    


var book=@json($books);
let readcount=book.filter(function(item){
    return item.user_id!=null
}).length;

let notreadcount=book.length-readcount;

console.log(book.length)
console.log(readcount)



    $('#list').change(function(){
        var option = $(this).children("option:selected").val();
        if(option=="read")
        {
            if(notreadcount==book.length)
            {
                                                                                                           
                $('#tbody').append('   <tr class="odd" id="no-book"><td valign="top" colspan="1" class="dataTables_empty">No Book Found</td></tr>')                       
            }
            else{
                $('#no-book').remove()
            }   
        $.each(book, function(i, item) {

           
    if(item.user_id==null)
    $('#'+item.id).css("display","none");
    else
    $('#'+item.id).css("display","table-row");
});
}
   else if(option=="notread"){
    if(readcount==book.length)
            {
                                                                                                           
                $('#tbody').append('   <tr class="odd" id="no-book"><td valign="top" colspan="1" class="dataTables_empty">No Book Found</td></tr>')                       
            }
            else{
                $('#no-book').remove()
            }
    $.each(book, function(i, item) {
    if(item.user_id!=null)
    $('#'+item.id).css("display","none");
    else
    $('#'+item.id).css("display","table-row");

    });
}

    else if(option=="all"){
        $('#no-book').remove()
    $.each(book, function(i, item) {
    
    $('#'+item.id).css("display","table-row");
    
    });
}
   

});

$("#sidebarToggleTop").remove()


   
console.log("cdvc");
    $( document ).ready(function() {
        console.log("cdvc");
        $('.dropdown-display-label').addClass("mx-2");
       
});

    </script>

    <style>

.marking{
    bottom:25px;
    left:50%;
    -webkit-transform: translateX(-50%);
transform: translateX(-50%)
}
        </style>

@endsection
