@extends('layouts.admin')


@section('content');



  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$usersCount-1}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Books</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$booksCount}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Books Read(This Week)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$userWeek}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-book-open fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
           </div>
          <!-- Card Body -->
          <div class="card-body">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Announcement</th>
                  <th scope="col">Created On</th>
                </tr>
              </thead>
              <tbody>
              @foreach($announcements as $announcement)
              <tr>
                <th scope="row">{{$announcement->id}}</th>
                <td>{{$announcement->announcement_body}}</td>
                <td>{{$announcement->created_at}}</td>
              </tr>
              @endforeach   
              </tbody>          
            </table>         
          </div>
        </div>
      </div>
    </div>
    </div>
      
    <div class="modal fade" id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action = "{{route('admin.announcements.store')}}" method="POST">
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="announcementModalLabel">Add a Announcement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Announcement Body</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="announcement"></textarea>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>          
      </div>
      </div>
    </div>
      
    


    

  
  <!-- /.container-fluid -->


<!-- End of Main Content -->

@endsection