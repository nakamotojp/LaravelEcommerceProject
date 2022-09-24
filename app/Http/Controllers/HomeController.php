<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

            // motomoto001
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

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
}
