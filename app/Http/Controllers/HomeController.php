<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

            // motomoto001
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Comment;

use App\Models\Reply;

use Session;
use Stripe;

class HomeController extends Controller
{
    
    
            // motomoto001
    public function index()
    {
        $product = Product::paginate(3);
        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();
        // dd($reply);
        // dd($comment);
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function redirect()
    {
        // motomoto001
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            $total_product = product::all()->count();
            $total_order = order::all()->count();            
            $total_user = user::all()->count();
            $order = order::all();
            $total_revenue=0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }
            $total_delivered = order::where('delivery_status','=','delivered')->get()->count();
            $total_proceeding = order::where('delivery_status','=','proceeding')->get()->count();
            
            return view('admin.home', compact('total_product','total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_proceeding'));
        }
        else
        {
            $product = Product::paginate(3);
            // $comment = Comment::all();
            $comment = comment::orderby('id', 'desc')->get();
            $reply = reply::all();
            // dd($reply);
            // dd($comment);
            return view('home.userpage', compact('product', 'comment', 'reply'));
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
            $userid = #user->id;
            
            $product = product::find($id);
            
            $product_exist_id = cart::where('product_id',$id)->where('user_id','=',$userid)->get('id')->first();
            
            
            if($product_exist_id)
            {
            $cart = cart::find($product_exist_id);
            $quantity = cart->quantity;
            $cart->quantity = $quantity + $request->quantity;
            $cart->save();
            return redirect()->back()->with('message','product_exist_id Successfully!');
            
            }
            else
            {
            $cart = new cart;
            
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;                
            }
            

            
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
    
    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));

    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from LaravelTus.com." 
        ]);


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


            $order->payment_status = 'Stripe Payment';       
            $order->delivery_status = 'proceeding';
            $order->save();
            
            $cart_id = $data->id;
            $cart = $data::find($cart_id);
            $cart->delete();
        }




        Session::flash('success', 'Payment successful!');
              
        return back();
    }
    
    public function product()
    {
        $product = Product::paginate(10);
        dd($product);
        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();
        
        return view('home.all_product', compact('product', 'comment', 'reply'));
    }
    
    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $order = order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));
        }
        else
        {
            return redirect('login');
        }

        $order = orders::find($id);
        
    }
    
    public function cancel_order($id)
    {
        $order = order::find($id);
        $order->delivery_status = 'Alredy Canceled Order';
        $order->save();
        
        return redirect()->back();
        
    }

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment = new comment;
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect()->back();
        }
        else
        {
            redirect('login');
        }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply = new reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment = $request->reply;
            $reply->comment_id = $request->commentId;
            $reply->save();
            return redirect()->back();
        }
        else
        {
            redirect('login');
        }
    }
    
}
