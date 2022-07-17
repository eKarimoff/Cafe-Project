<x-app-layout></x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>
    
    <div class="content">
    @include('admin.navbar')
    <div class="container" style="width:90%">
      <h3 style="text-align: center">Users Table</h3>
<div class="main">
      <table class="table table-bordered">
        <tr style="text-align:center">
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        @foreach ($users as $user)
        <tr style="text-align:center">
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          @if($user->usertype=='0')
          <td><a class="btn btn-danger" href="{{ url('/deleteUser',$user->id)}}">Delete</a></td>
          @else
          <td>Not allowed</td>
          @endif
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
   @include('admin.adminscript')
  
  </body>
</html>