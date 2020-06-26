@extends('layouts.user')

@section('content')
<script src="//code.jquery.com/jquery.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">


<style>



@media (min-width: 576px){
.container {
    max-width: 720px;
}
}
@media (min-width: 768px){
.container {
    max-width: 960px;
}
}
@media (min-width: 992px){
.container {
    max-width: 1140px !important;
}
}
@media (min-width: 1200px){
.container {
    max-width: 1140px !important;
}
}

</style>


<div class="container">
         
        
            <div class="row pb-3">
                  {{-- <div class="col-md-3">
                      <div class="form-inline">
                <label for="List ">List By:</label>
                <select class="form-control mx-2" id="list" name="list">
                    <option value="all">All</option>
                    <option value="read">Read</option>
                    <option value="notread">Not Read</option>
                   
                </select>
                    </div>
                </div> --}}
                    <div class="col-md-12 ">
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
            <marquee class="text-danger h4 font-weight-bold">{{$finalAnnouncement ?? ''}}</marquee>                 
            <div id="app">
               <card-layout :books="{{$books}}"></card-layout>
            </div>        
        </div>

<script >

Vue.mixin({
  data: function() {
    return {
      get public_path() {
        return "{{asset('')}}";
      }
    }
  }
});

Vue.prototype.$route = "{{route('books.read')}}";

const app = new Vue({
    el: '#app',
   
});


// $('.bookNotRead').click(function(mybutton){
//   $.ajax({url: $(this).attr('data-item'), success: function(result){
//    console.log(result.id)
//       $(mybutton.target).addClass('badge-success').removeClass('bookNotRead').html('<i class="fa fa-check"></i> You have read this book')
//       $.each(book, function(i,item) {
//   if (item.id==result.id) {
//       item.user_id=0
    
//   }
  
// });
//   },
//   error: function(result){
//   console.log(result);
//   }
  
//   });
// });
    


// var book=@json($books);
// console.log(book);
// let readcount=book.filter(function(item){
//     return item.user_id!=null
// }).length;

// let notreadcount=book.length-readcount;

// console.log(book.length)
// console.log(readcount)



//     $('#list').change(function(){
//         var option = $(this).children("option:selected").val();
//         if(option=="read")
//         {
//             if(notreadcount==book.length)
//             {
                                                                                                           
//                 $('#tbody').append('   <tr class="odd" id="no-book"><td valign="top" colspan="1" class="dataTables_empty">No Book Found</td></tr>')                       
//             }
//             else{
//                 $('#no-book').remove()
//             }   
//         $.each(book, function(i, item) {

           
//     if(item.user_id==null)
//     $('#'+item.id).css("display","none");
//     else
//     $('#'+item.id).css("display","table-row");
// });
// }
//    else if(option=="notread"){
//     if(readcount==book.length)
//             {
                                                                                                           
//                 $('#tbody').append('   <tr class="odd" id="no-book"><td valign="top" colspan="1" class="dataTables_empty">No Book Found</td></tr>')                       
//             }
//             else{
//                 $('#no-book').remove()
//             }
//     $.each(book, function(i, item) {
//     if(item.user_id!=null)
//     $('#'+item.id).css("display","none");
//     else
//     $('#'+item.id).css("display","table-row");

//     });
// }

//     else if(option=="all"){
//         $('#no-book').remove()
//     $.each(book, function(i, item) {
    
//     $('#'+item.id).css("display","table-row");
    
//     });
// }
   

// });

// $("#sidebarToggleTop").remove()


   

//     $( document ).ready(function() {
     
//         $('.dropdown-display-label').addClass("mx-2");
       
// });

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
