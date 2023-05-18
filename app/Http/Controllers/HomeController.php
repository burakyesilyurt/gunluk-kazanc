<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @param  Request
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
    public function index(Request $request)
    {
        //dd(Auth::User()->role);
        //dd($request->User()->name);
        // if ($request->User()->role == 1) {
        //     dd("role1");
        // } else {
        //     dd("role2");
        // }

        return view('home');
    }
}
