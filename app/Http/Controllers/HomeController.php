<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Salad;
class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('/home');
        }
        else
        {
        
            $foods = Food::all();
            $chefs = Chefs::all();
            $user_id = Auth::id();
            $salads = Salad::all();
            $count = Cart::where('user_id', $user_id)->count();

            return view('home', ['foods'=>$foods,'chefs'=>$chefs,'count'=>$count,'salads'=>$salads]);
        }
    }

    public function redirects()
    {
        $foods = Food::all();
        $chefs = Chefs::all();
        $salads = Salad::all();
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('home' ,compact('foods','chefs','count','salads'));
        }
        else
        {
            $user_id = Auth::id();

            $count = Cart::where('user_id', $user_id)->count();

            return view('home',compact('foods','chefs','count','salads'));
        }
    }

    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();
            session()->flash('success', 'Your order has been saved to your cart successfully!');
            return redirect()->back();
        }

        else
        {
            return redirect('/login');
        }
    }

    public function showcart(Request $request,$id)
    {
        $count = Cart::where('user_id',$id)->count();
        if(Auth::id()==$id)
        {

        // $cart_id = Cart::select('*')->where('user_id','=',$id)->get();
        // $data = Cart::select('*')->where('user_id',$id)->join('foods','carts.food_id','=','foods.id')->with('user')->get();
       $data = Cart::where('user_id',$id)->with(['user','food'])->get();

        return view('showcart',compact('count','data',));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function remove($id)
    {
        $remove = Cart::find($id);
        $remove->delete();

        session()->flash('success','Your product has been removed successfully!');
        return redirect()->back();
    }

    public function orderconfirm(Request $request)
    {
        foreach($request->foodname as $key=>$foodname)

        {
            $order = new Order();
            $order->foodname = $foodname;
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;

            $order->save();

            $cart = Cart::where('user_id','=',$request->user_id)->first();
        //   dd($cart);
            $cart->delete();

        }

        session()->flash('order','Your order has been placed successfully!');
        return redirect()->back();
    }
}
