<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logo;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = logo::orderBy('created_at','desc')->get();
        return view('home',compact('views','logo'));
    }
}
