<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Works;
use App\Models\User;

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
        return view('admin.main');
    }
    public function ilanlar()
    {
        $ilanlar = Works::orderBy('created_at', 'desc')->get(['id', 'baslik', 'sehir', 'sektor', 'basvuru_sayisi']);
        return view('admin.ilanlar', ["ilanlar" => $ilanlar]);
    }

    public function kullanicilar()
    {
        //silme yapılacak
        $users = User::where('role', 1)->orderBy('created_at', 'desc')->get(['id', 'name', 'email']);
        return view('admin.users', ['users' => $users]);
    }
    public function firmalar()
    {
        //silme yapılacak
        $employers = User::where('role', 2)->orderBy('created_at', 'desc')->get(['id', 'name', 'email']);
        return view('admin.employers', ['employers' => $employers]);
    }
}
