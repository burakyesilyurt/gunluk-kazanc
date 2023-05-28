<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Works;
use App\Models\Applicants;

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


        if ($request->query('baslik')) {

            $works = Works::where('baslik', 'LIKE', '%' . $request->query('baslik') . '%')->get();
        } elseif ($request->query('sehir') || $request->query('sektor')) {
            $works = Works::where('sehir', 'LIKE', '%' . $request->query('sehir') . '%')->where('sektor', 'LIKE', '%' . $request->query('sektor') . '%')->get();
        } else {
            $works = Works::orderBy('created_at', 'DESC')->get();
        }



        return view('jobs', ['works' => $works]);
    }

    public function ilan($id, Request $request)
    {

        $ilan = Works::findOrFail($id);
        $mesaj = false;

        if (Applicants::where('kullanici_id', $request->User()->id)->where('ilan_id', $id)->exists()) {
            $mesaj = true;
        }

        return view('job', ['ilan' => $ilan, 'mesaj' => $mesaj]);
    }

    public function basvuruAl(Request $request)
    {

        if ($request->User()->role == 2) {
            return redirect('/ilanlar');
        }



        $applicants = Applicants::create([
            'firma_id' => $request->firma_id,
            'ilan_id' => $request->id,
            'kullanici_id' => $request->User()->id
        ]);
        $applicants->save();
        Works::where('id', $request->id)->increment('basvuru_sayisi', 1);

        return redirect('/ilanlar')->with('message', true);
    }
}
