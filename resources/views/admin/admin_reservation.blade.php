<x-app-layout></x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>
    <base href="/public">
      <div class="content">
    @include('admin.navbar')
    <div class="container">
              <h3 style="text-align: center">Reservations Table</h3>
                <table class="table table-bordered" style="text-align:center; width:100%">
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Guest</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Message</th>
                    </tr>
                    @foreach($reservation as $data)
                    <tr>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->guest }}</td>
                      <td>{{ $data->date }}</td>
                      <td>{{ $data->time }}</td>
                      <td>{{ $data->message }}</td>
                      
                      {{-- <td><a href="{{ url('/deleteFood',$data->id) }}">Delete</a> | <a href="{{ url('/editFood',$data->id) }}"> Edit</a></td> --}}
                    </tr>
                    @endforeach
                  </table>
            </div>
        </div>
  </div>
   @include('admin.adminscript')
  
  </body>
</html>