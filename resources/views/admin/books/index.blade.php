@extends('layouts.admin')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
            <div class="col-md-4 mb-4">
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
                                    <td>
                                                
                                            @foreach ($book->genres()->get() as $genre)
                                            
                                            {{ $genre['genre'] }} 
                                            @if ($loop->last) @break @endif
                                            ,
                                            
                                            @endforeach</td>
                                        
                                    <td>
                                    <a href="{{ route('admin.books.edit', $book->id) }}" > <button type="button" class="float-left btn btn-warning">Edit</button></a>
                                 
                                    <a href="#myModal" class="trigger-btn btn btn-danger myModal ml-2" data-toggle="modal" data-item="{{ route('admin.books.destroy',$book->id) }}">Delete</a>
                                  
                                    </td>
                                </tr>
                                @endforeach
                       
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<style>
.small-logo{
    max-width: 50px;
}

</style>

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                           
                <h4 class="modal-title">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                    <form action="" method="POST" id="modal-form">
                            @csrf
                         @method('delete')
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
        </div>
    </div>
</div>     


<script
src="https://code.jquery.com/jquery-3.5.0.min.js"
integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
crossorigin="anonymous"></script>
<script>
$('.myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})

$(document).on("click", ".trigger-btn", function () {
var itemid= $(this).attr('data-item');


$('#modal-form').attr('action' , itemid);
});


</script>

@if (session('message'))
<div class="container text-center">
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
</div>
@endif




<div class="container-fluid">

        
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="h4 font-weight-bold text-primary">Books Management</h4>
                <a href="{{route('admin.books.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Book</a>
                      </div>
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="">
              <thead>
                <tr>
                  <th>Cover</th>
                  <th>Name</th>
                  <th>Author</th>
                  <th>Edition</th>
                  <th>Genre</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                        <th>Cover</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>Genre</th>
                        <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              
                    @foreach($books as $book)
                    <tr>
                    <td> <img class="img-profile small-logo " src="{{asset('images/cover/'.$book->cover)}}"></td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->edition }}</td>
                        <td>
                                    
                                @foreach ($book->genres()->get() as $genre)
                                
                                {{ $genre['genre'] }} 
                                @if ($loop->last) @break @endif
                                ,
                                
                                @endforeach</td>
                            
                        <td>
                      <div class="d-flex">
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                     
                        <a href="#myModal" class="trigger-btn btn btn-danger myModal ml-2" data-toggle="modal" data-item="{{ route('admin.books.destroy',$book->id) }}">Delete</a>
                    </div>
                        </td>
                    </tr>
                    @endforeach
           
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>


@endsection
