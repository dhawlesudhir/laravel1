<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ip = '122.169.9.32'; //For static IP address get
        //$ip = request()->ip(); //Dynamic IP address get
        // $userLocationData = \Location::get($ip);
        // if($userLocationData){
        //     print_r($userLocationData->timezone);   
        // }
        //Session::get('sessionTz')

      




        return view('home');
    }



}
