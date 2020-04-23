@extends('layouts.admin')

@section('content')






{{-- <div class="container mt-4" >
    <div class="row justify-content-center">
       
        <div class="col-md-8">
                <h1 class=lead-4>User Management</h1>
            <div class="card">
              
                  
                   
                   

<div class="table-responsive">
                    <table class="table">
                        <thead >
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Configure</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td >
                           
                           
                             @if(!$user->hasrole('admin'))
                             <a href="#myModal" class="trigger-btn btn btn-danger myModal" data-toggle="modal" data-item="{{ route('admin.users.destroy',$user->id) }}">Delete</a>
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
</div>
--}}

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
                                {{ method_field('DELETE')}}
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
          <h6 class="h4 m-0 font-weight-bold text-primary">User Management</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td >
                   
                   
                     @if(!$user->hasrole('admin'))
                     <a href="#myModal" class="trigger-btn btn btn-danger myModal" data-toggle="modal" data-item="{{ route('admin.users.destroy',$user->id) }}">Delete</a>
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
@endsection
