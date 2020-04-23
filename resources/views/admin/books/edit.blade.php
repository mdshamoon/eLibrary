@extends('layouts.admin')

@section('content')

<script src="//code.jquery.com/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/jquery.dropdown.min.css')}}" type="text/css">

<style>
        .invalid-feedback{
            display:block;
        }

        .border-red{
            border: 1px solid #e74a3b;
        }
    </style>


<script src="{{asset('js/jquery.dropdown.min.js')}}"></script>
<div class="container d-flex justify-content-center">

        
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                            <h4 class="h4 font-weight-bold text-primary">Edit Book</h4>
                           
                          </div>
              
            </div>
            <div class="card-body ">
                
              
                 <form action="{{route('admin.books.update',$book->id)}}" class="m-4 " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                            <label for="Name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" id="name" name="name" value="{{$book->name}}">
                            @error('name')
                            <span class="invalid-feedback ml-2" role="alert" >
                                <strong>{{ $errors->first('name') }} </strong>
                                
                            </span>
                            @enderror
                            
                        
                        </div>
                        <div class="form-group">
                            <label for="Author">Author:</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" placeholder="Enter Author's name" id="authorName" value="{{$book->author}}">
                            @error('author')
                            <span class="invalid-feedback ml-2" role="alert">
                                <strong>{{ $errors->first('author') }} </strong>
                            </span>
                        @enderror
                        
                        </div>
    
                        <div class="form-group">
                            <label for="Edition">Edition:</label>
                            <input type="text" name="edition" class="form-control @error('edition') is-invalid @enderror" placeholder="Enter Edition" id="edition" value="{{$book->edition}}">
                            @error('edition')
                            <span class="invalid-feedback ml-2" role="alert">
                                <strong>{{ $errors->first('edition') }} </strong>
                            </span>
                        @enderror
                        </div>
    
                        <div class="form-group demo mb-0">
                            <label for="sel1">Select Genre:</label>
                            <select class="form-control " style="display:none" id="genre" name="genre[]" multiple="multiple" value="">
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
                            @error('genre')
                            <span class="invalid-feedback ml-2" role="alert">
                                <strong>{{ $errors->first('genre') }} </strong>
                            </span>
                        @enderror

                   
                            <div class="text-center mb-2">

                        <img src="{{asset('images/cover/'.$book->cover)}}" class="img-thumbnail img" style="max-height: 200px">
                    </div>

                            <div class="form-group">
                                    <label for="poster">Book Cover:</label>
                                    <input type="file" name="cover" class="form-control"  id="cover" >
                                </div>   
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>    
                   
                   
          
                </div>
            </div>
        </div>
    </div>



<script>
        $('.demo').dropdown({
            multipleMode:'label',
           
    
    });


    $('.is-invalid').keypress(function() {
    $(this).next().css('display','none');
  $(this).removeClass('is-invalid')
});


@error('genre')
$('.dropdown-display-label').addClass('border-red')

@enderror

$('.dropdown-search input').click(function(){
    $('.dropdown-display-label').removeClass('border-red')
    $('.dropdown-multiple-label').next().css('display','none');
})
    // @foreach($mygenres as $genre)

   
    // $('#genre option').filter(function()
    // {
        
    //     return this.value=="{{$genre->genre}}";
        
    //     }).prop("selected", true);
        
           
            
       
   
    // @endforeach

   
    
   

    </script>
@endsection