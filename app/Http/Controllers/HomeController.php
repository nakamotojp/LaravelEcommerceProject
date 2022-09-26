<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

            // motomoto001
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    
    
            // motomoto001
    public function index()
    {
        $product = Product::paginate(3);
        return view('home.userpage', compact('product'));
    }

    public function redirect()
    {
        // motomoto001
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            return view('admin.home');
        }
        else
        {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details',compact('product'));
    }
    
    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $product = product::find($id);
            
            $cart = new cart;
            
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            
            if($product->discount_price != null)
            {
            $cart->price = $product->discount_price * $request->quantity;                
            }
            else
            {
            $cart->price = $product->price * $request->quantity;    ;                
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $product->quantity;
            
            $cart->save();
            
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if(Auth::id())
        {
            

        $id = Auth::user()->id;
        $cart = cart::where('user_id','=',$id)->get();
        return view('home.show_cart', compact('cart'));
        
        }
    }
    
    public function remove_cart($id)
    {
        $cart = cart::find($id);
        
        $cart->delete();
        flash('Remove Cart')->warning();
        return redirect()->back()->with('message','Product in Cart Deleted Successfully!');
    }
    
    public function cash_order()
    //     public function cash_order($id)
    {
        $user = Auth::user();
        $userid = $user->id;
        
        $data = cart::where('user_id','=',$userid)->get();
        
        foreach($data as $data)
        {
            $order = new order;
            
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            
            // if($data->discount_price != null)
            // {
            // $order->price = $data->discount_price * $request->quantity;                
            // }
            // else
            // {
            // $order->price = $data->price * $request->quantity;    ;                
            // }

            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->quantity = $data->quantity;

            $order->delivery_status = 'proceeding';
            $order->payment_status = 'cash on delivery';            
            $order->save();
            
            $cart_id = $data->id;
            $cart = $data::find($cart_id);
            $cart->delete();
        }
        flash('Order recieved!')->warning();
        return redirect()->back()->with('message','We have recieved your Order');
    }
}
