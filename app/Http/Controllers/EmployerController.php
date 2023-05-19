<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\works;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

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

    public function ilanOlustur(Request $request)
    {
        if ($request->User()->role == 1) {
            return redirect('/profil');
        }



        $request->validate([
            'baslik' => 'required|string|max:255',
            'sehir' => 'required|string|max:255',
            'sektor' => 'required|string|max:255',
            'aciklama' => 'required|string',
        ]);




        $works = works::create([
            'baslik' => $request->baslik,
            'sehir' => $request->sehir,
            'sektor' => $request->sektor,
            'aciklama' => $request->aciklama,
            'firma_id' => $request->User()->id,
            'basvuru_sayisi' => 0,
        ]);

        $works->save();
        return redirect('ilanver');
    }

    public function ilanlarim(Request $request)
    {
        if ($request->User()->role == 1) {
            return redirect('/profil');
        }

        $ilanlar = DB::table('works')->where('firma_id', $request->User()->id)->get();

        return view('employer.see_works', ["ilanlar" => $ilanlar]);
    }
}
