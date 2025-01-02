<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

<<<<<<< HEAD
=======
use App\Models\User;

use App\Models\Cart;

use App\Models\Order;


use Illuminate\Support\Facades\Auth;


>>>>>>> a89f420 (Ladiva final)
class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype','user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $Delivered = Order::where('status','Delivered')->get()->count();

        return view('admin.index', compact('user','product','order','Delivered'));
    }

    public function home()
    {
        $product = Product::all();

<<<<<<< HEAD
        return view('home.index', compact('product'));
=======
        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        
        else
        {
            $count = '';
        }
       
        return view('home.index', compact('product','count'));
>>>>>>> a89f420 (Ladiva final)
    }

    public function login_home()
    {
        $product = Product::all();
<<<<<<< HEAD

        return view('home.index', compact('product'));
    }

    
=======
        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        
        else
        {
            $count = '';
        }
        return view('home.index', compact('product','count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        
        else
        {
            $count = '';
        }
        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        
        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        return redirect()->back();
    }

    public function mycart()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        
        
        return view('home.mycart', compact('count','cart'));
    }

    public function remove_cart($id)
    {
        // Temukan item keranjang berdasarkan ID
        $cart = Cart::find($id);
        
        $cart->delete();

        return redirect()->back();
        
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->product_id = $carts->product_id;

            $order->name = $name;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->save();

        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        return redirect()->back();

    
    }

    public function myorders()
    {
        
        $user = Auth::user()->id;

        $count = Cart::where('user_id',$user)->get()->count();

        $order = Order::where('user_id',$user)->get();

        return view('home.order',compact('count','order'));
    }

    public function shop()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        
        else
        {
            $count = '';
        }
       
        return view('home.shop', compact('product','count'));
    }

    public function why()
    {
        

        if(Auth::id())
        {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        
        else
        {
            $count = '';
        }
       
        return view('home.why', compact('count'));
    }


>>>>>>> a89f420 (Ladiva final)
}
