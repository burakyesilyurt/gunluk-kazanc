<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{

    public function index(Request $request)
    {
        $works = DB::table('works')->orderBy('created_at', 'DESC')->take(3)->get();

        return view('welcome', ['works' => $works]);
    }
}
