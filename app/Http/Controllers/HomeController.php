<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        //dd(Auth::user()->user_type); 
        if(Auth::user()->user_type == config('constants.admin_user_type')){
            return view('dashboard');
        }else if(Auth::user()->user_type == config('constants.brand_user_type')){
            return view('brand/dashboard');
        }else if(Auth::user()->user_type == config('constants.production_user_type')){
            return view('production/dashboard');
        }else{
            echo "Something went wrong!!!!";
        }
    }
}
