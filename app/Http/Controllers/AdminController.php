<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Works;

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
        return view('admin.ilanlar');
    }
    public function firmalar()
    {
        return view('admin.ilanlar');
    }
}
