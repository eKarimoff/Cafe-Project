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

            <h3 style="text-align: center">Add New Foods</h3>
    @if(Session::has('food add'))
    <div class="alert alert-success" role="alert">{{ Session::get('food add') }}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('Updated'))
    <div class="alert alert-success" role="alert">{{ Session::get('Updated') }}</div>
    @endif
    <div class="main" style="width:100%">
    <form action="uploadfood" method="POST" enctype="multipart/form-data" class="form-horizontal mt-3">
      @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Price</label>
          <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Image</label>
        <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="exampleCheck1">Description</label>
        <input type="text" class="form-control" name="description">
        </div>
        <button type="submit" class="btn btn-primary mb-5" style="float: right">Submit</button>
      </form>
    </div>
    <h3 style="text-align: center">All Foods</h3>
      <table class="table table-bordered" style="text-align:center; width:100%">
          <tr>
            <th>Food Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          @foreach($foods as $food)
          <tr>
            <td>{{ $food->title }}</td>
            <td>{{ $food->price }}</td>
            <td>{{ $food->description }}</td>
            <td><img src="/foodimage/{{ $food->image }}" alt=""  style="display: inline-block; height:70px;  width:100px"></td>
            <td><a href="{{ url('/deleteFood',$food->id) }}">Delete</a> | <a href="{{ url('/editFood',$food->id) }}"> Edit</a></td>
          </tr>
          @endforeach
        </table>
     

    </div>
  </div>

   @include('admin.adminscript')
  
  </body>
</html>