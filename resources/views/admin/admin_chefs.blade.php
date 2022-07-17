<x-app-layout></x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>
    <div class="content">
        @include('admin.navbar')
        <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('update'))
            <div class="alert alert-success" role="alert">{{ Session::get('update') }}</div>
            @endif
            @if(Session::has('delete'))
            <div class="alert alert-success" role="alert">{{ Session::get('delete') }}</div>
            @endif
        <h3 style="text-align: center">Add New Chefs</h3>

    <div class="main" style="width:100%">
        <form action="{{ url('uploadchef') }}" method="POST" enctype="multipart/form-data" class="form-horizontal mt-3">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Speciality</label>
              <input type="text" class="form-control" name="speciality">
            </div>
            <div class="mb-3">
                <label class="form-check-label" for="exampleCheck1">Image</label>
            <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary mb-5" style="float: right">Submit</button>
          </form>
        </div>
        <h3 style="text-align: center">All Chefs</h3>
        <table class="table table-bordered" style="text-align:center; width:100%">
            <tr>
              <th>Chefs Name</th>
              <th>Speciality</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            @foreach($chefs as $chef)
            <tr>
              <td>{{ $chef->name }}</td>
              <td>{{ $chef->speciality }}</td>
              <td><img src="/chefimage/{{ $chef->image }}" alt=""  style="display: inline-block; height:100px;  width:200px"></td>
              <td><a href="{{ url('/deletechef',$chef->id) }}">Delete</a> | <a href="{{ url('/editchef',$chef->id) }}"> Edit</a></td>
            </tr>
            @endforeach
          </table>
       
    </div>
  </div>
   @include('admin.adminscript')
  
  </body>
</html>