<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
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

    public function index(Request $request)
    {
        if ($request->User()->role == 1) {
            return redirect('/profil');
        }
        return view('employer.employer');
    }

    public function ilanVer(Request $request)
    {
        if ($request->User()->role == 1) {
            return redirect('/profil');
        }
        return view("employer.add_work");
    }
}
