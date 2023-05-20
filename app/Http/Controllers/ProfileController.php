<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class ProfileController extends Controller
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
        if ($request->User()->role == 2) {
            return redirect('/isveren');
        }

        if (Employee::where('user_id', $request->User()->id)->exists()) {
            $user = Employee::where('user_id', $request->User()->id)->first();
            return view('profile.profile', ['user' => $user]);
        }

        return view('profile.profile');
    }

    public function profilOlustur(Request $request)
    {

        if ($request->User()->role == 2) {
            return redirect('/isveren');
        }


        $request->validate([
            'isim' => 'required|string|max:255',
            'yas' => 'required|numeric|max:100',
            'tel' => 'required|min:8|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'universite' => 'nullable|string',
            'bolum' => 'nullable|string'
        ]);


        if (Employee::where('user_id', $request->User()->id)->exists()) {
            Employee::where('user_id', $request->User()->id)->update([
                'isim' => $request->isim,
                'yas' => $request->yas,
                'telefon' => $request->tel,
                'universite' => $request->universite,
                'bolum' => $request->bolum,
            ]);
            return redirect('/');
        }



        $employee = Employee::create([
            'isim' => $request->isim,
            'yas' => $request->yas,
            'telefon' => $request->tel,
            'universite' => $request->universite,
            'bolum' => $request->bolum,
            'mail' => $request->User()->email,
            'user_id' => $request->User()->id
        ]);

        $employee->save();

        return redirect('/');
    }
}
