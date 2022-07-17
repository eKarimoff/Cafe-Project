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
              <h3 class="mb-3" style="text-align: center">Orders Table</h3>
              <div class="d-flex" style="justify-content: center">
        <form action="{{ url('search') }}" method="get" style="width:500px" >
            @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary" type="submit" >Search</button>
            </form>
              </div>
            </div>
                <table class="table table-bordered" style="text-align:center; width:100%">
                    <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Food Name</th>
                      <th>Image</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total Price</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->name }}</td>
                      <td>{{ $order->phone }}</td>
                      <td>{{ $order->address }}</td>
                      <td>{{ $order->foodname }}</td>
                      <td><img src="foodimage/{{ $order->image }}" alt="" style="width:150px ;height:70px; display:inline-block"></td>
                      <td>{{ $order->quantity }}</td>
                      <td>{{ $order->price }}$</td>
                      <td>{{ $order->price * $order->quantity }}$</td>
                      
                    </tr>
                    @endforeach
                  </table>
                  <div class="d-flex" style="justify-content:center">
                    {{ $orders->links() }}
                  </div>
            </div>
           
        </div>
  </div>
   @include('admin.adminscript')
  
  </body>
</html>