<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Works;

class WelcomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['ilan', 'basvuruAl']]);
    }

    public function index(Request $request)
    {
        $works = Works::orderBy('created_at', 'DESC')->take(3)->get();

        return view('welcome', ['works' => $works]);
    }

    public function ilanlar(Request $request)
    {
        $works = Works::orderBy('created_at', 'DESC')->get();

        return view('jobs', ['works' => $works]);
    }

    public function ilan($id, Request $request)
    {
        $ilan = Works::findOrFail($id);
        return view('job', ['ilan' => $ilan]);
    }

    public function basvuruAl(Request $request)
    {

        if ($request->User()->role == 2) {
            return redirect('/ilanlar');
        }

        //dd($request->id);
        // dd($request->User()->id);
        Works::where('id', $request->id)->increment('basvuru_sayisi', 1);

        return redirect('/ilanlar')->with('message', true);
    }
}
