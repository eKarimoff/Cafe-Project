<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chefs;
use App\Models\Order;
use App\Models\Salad;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function deleteUser($id)
    {
        $deleteUser = User::find($id);
        $deleteUser->delete();
        return redirect()->back();
    }

    public function deleteFood($id)
    {
        $delete = Food::find($id);
        $delete->delete();
        
        session()->flash('success','Food has been deleted successfully!');
        return redirect()->back();
    }

    public function editFood($id)
    {
        $edit = Food::find($id);
        
        return view('admin.update_food',compact('edit'));
    }
    public function updateFood(Request $request,$id)
    {
        $data = Food::find($id);
        $image = $request->image;

        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imageName);

        $data->image = $imageName;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        session()->flash('Updated','All Data has been updated successfully!');
        return redirect()->route('foodmenu');
    }
  
    public function foodmenu()
    {
        $foods = Food::all();
        return view('admin.foodmenu',['foods'=>$foods]);
    }

    public function upload(Request $request)
    {
        $data = new Food();

        $image = $request->image;

        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imageName);

        $data->image = $imageName;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        session()->flash('food add','Food has been added successfully!');
        return redirect()->back();
    }

    public function makeReservation(Request $request)
    {
       
        $reserv = new Reservation();

        $reserv->name = $request->name;
        $reserv->email = $request->email;
        $reserv->phone = $request->phone;
        $reserv->guest = $request->guest;
        $reserv->date = $request->date;
        $reserv->time = $request->time;
        $reserv->message = $request->message;

        $reserv->save();
         
        return redirect()->back();
    }

    public function admin_reservation()
    {
        if(Auth::id()){

       
        $reservation = Reservation::all();

        return view('admin.admin_reservation',compact('reservation'));
    }
    else
    {
        return redirect('login');
    }
    }


    public function viewchef()
    {
        $chefs = Chefs::all();
        return view('admin.admin_chefs' ,compact('chefs'));
    }

    public function uploadchef(Request $request)
    {
        $chef = new Chefs();

        $image = $request->image;

        $chefImage = time(). '.'.$image->getClientOriginalExtension();

        $request->image->move('chefimage',$chefImage);

        $chef->image = $chefImage;

        $chef->name = $request->name;
        $chef->speciality = $request->speciality;

        $chef->save();

        session()->flash('success','New Chef added successfully!');
        return redirect()->back();

    }

    public function updatechef(Request $request,$id)
    {
        $update = Chefs::find($id);

        $image = $request->image;

        $chefImage = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('chefimage', $chefImage);

        $update->image = $chefImage;

        $update->name = $request->name;

        $update->speciality = $request->speciality;

        $update->save();

        session()->flash('update','Chef data has been updated successfully!');

        return redirect()->route('viewchef');

    }

    public function deletechef($id)
    {
        $delete = Chefs::find($id);
        $delete->delete();

        session()->flash('delete','Data has been deleted successfully!');
        return redirect()->back();
    }

    public function editchef($id)
    {
        $edit = Chefs::find($id);

        return view('admin.update_chef',compact('edit'));
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at')->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $orders = Order::where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('foodname', 'LIKE', '%'.$search.'%')
        ->orWhere('price','LIKE', '%'.$search.'%')
        ->orWhere('address','LIKE', '%'.$search.'%')
        ->paginate(10);

        return view('admin.orders', compact('orders'));
    }

    public function salads()
    {
        return view('admin.salad');
    }
    
    public function makesalad(Request $request)
    {   
        $salad = new Salad();
        $salad->name = $request->name;
        $salad->price = $request->price;
        $salad->description = $request->description;
        
        $image = $request->image;

        $saladImage = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('saladimage',$saladImage);

        $salad->image = $saladImage;

        $salad->save();
        session()->flash('success','Your data has been saved successfully!');
        return redirect()->back();
    }
}
