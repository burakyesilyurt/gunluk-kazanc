<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\works;
use Illuminate\Support\Facades\Validator;

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
            'baslik' => ['required', 'string', 'max:255'],
            'sehir' => ['required', 'string', 'max:255'],
            'sektor' => ['required', 'string', 'max:255'],
            'aciklama' => ['required', 'string'],
            'firma_id' => ['required'],
            'basvuru_sayisi' => ['required', 'unsignedBigInteger']
        ]);
        works::create([
            'baslik' => $request->baslik,
            'sehir' => $request->il,
            'sektor' => $request->sektor,
            'aciklama' => $request->aciklama,
            'firma_id' => $request->User()->id,
            'basvuru_sayisi' => 0,
        ]);
        // $work = new works;
        // $work->baslik = $request->baslik;
        // $work->sehir = $request->il;
        // $work->sektor = $request->sektor;
        // $work->aciklama = $request->aciklama;
        // $work->firma_id = $request->User()->id;
        // $work->basvuru_sayisi = 0;
        // $work->save();


        return redirect('ilanver');
    }
}
