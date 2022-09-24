<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

            // motomoto001
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    
    
            // motomoto001
    public function index()
    {
            // motomoto001
        if(Auth::user()->usertype)
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
                return view('admin.home');
            }
            else
            {
                return view('home.userpage');
            }
        }
        else
        {
            return view('welcome');
        }
    }

    public function redirect()
    {
            // motomoto001
        if(Auth::user()->usertype)
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
                return view('admin.home');
            }
            else
            {
                return view('home.userpage');
            }
        }
        else
        {
            return view('welcome');
        }
    }
}
