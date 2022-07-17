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
          <h3 style="text-align: center">Update Food</h3>
        <div class="main" style="width:95%">
            <form action="{{ url('updatechef',$edit->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal mt-3">
                @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $edit->name }}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Speciality</label>
                    <input type="text" class="form-control" name="speciality" value="{{ $edit->speciality }}">
                  </div>
                  <div class="mb-3">
                      <label class="form-check-label" for="exampleCheck1">Old Image</label>
                  <img src="/chefimage/{{$edit->image}}" style="width:300px; height:150px; border-radius:25px">
                  </div>
                  <div class="mb-3">
                    <label class="form-check-label" for="exampleCheck1">New Image</label>
                <input type="file" class="form-control" name="image" value="{{ $edit->image }}">
                </div>
                  <button type="submit" class="btn btn-primary mb-5" style="float: right">Update</button>
                </form>
            </div>
      </div>
    </div>
    </div>

  </div>
   @include('admin.adminscript')
  
  </body>
</html>