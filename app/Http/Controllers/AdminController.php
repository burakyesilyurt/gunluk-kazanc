<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Works;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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


    public function index()
    {
        if (Auth::user()->role != 3) {
            return redirect('/');
        }

        return view('admin.main', [
            'ilanlar' => Works::count(),
            'kullanicilar' => User::where('role', 1)->count(),
            'isverenler' => User::where('role', 2)->count()
        ]);
    }
    public function ilanlar()
    {
        if (Auth::user()->role != 3) {
            return redirect('/');
        }
        $ilanlar = Works::orderBy('created_at', 'desc')->get(['id', 'baslik', 'sehir', 'sektor', 'basvuru_sayisi']);
        return view('admin.ilanlar', ["ilanlar" => $ilanlar]);
    }

    public function kullanicilar()
    {
        if (Auth::user()->role != 3) {
            return redirect('/');
        }

        $users = User::where('role', 1)->orderBy('created_at', 'desc')->get(['id', 'name', 'email']);
        return view('admin.users', ['users' => $users]);
    }
    public function firmalar()
    {
        if (Auth::user()->role != 3) {
            return redirect('/');
        }

        $employers = User::where('role', 2)->orderBy('created_at', 'desc')->get(['id', 'name', 'email']);
        return view('admin.employers', ['employers' => $employers]);
    }

    public function kullaniciSil($id)
    {
        if (Auth::user()->role != 3) {
            return redirect('/');
        }
        User::destroy($id);
        return redirect()->back();
    }
}
