@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                  
                   
                   


                    <table class="table">
                        <thead class="thead-dark">
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
                            <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" > <button type="button" class="float-left btn btn-warning">Edit</button></a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="ml-2 float-left" >
                            @csrf
                            {{ method_field('DELETE')}}
                             @if(!$user->hasrole('admin'))
                             <button type="submit" class="btn btn-danger">Delete</button>
                             @endif
                             </form>
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
@endsection
