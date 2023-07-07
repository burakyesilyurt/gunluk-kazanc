<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Works;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class Jobs extends Controller
{
    public function getJobs()
    {
        $jobs = Works::orderBy('created_at', 'DESC')->get();
        if ($jobs->count() > 0) {
            return response()->json(['status' => 200, 'jobs' => $jobs], 200);
        }
        return response()->json(['status' => 404, 'message' => "iş ilanı bulunamamakta"], 404);
    }

    public function saveJob(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'baslik' => 'required|string|max:255',
            'sehir' => 'required|string|max:255',
            'sektor' => 'required|string|max:255',
            'aciklama' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }


        $jobs = Works::create([
            'baslik' => $request->baslik,
            'sehir' => $request->sehir,
            'sektor' => $request->sektor,
            'aciklama' => $request->aciklama,
            'firma_id' => $request->firma_id,
            'basvuru_sayisi' => 0,
        ]);

        if ($jobs) {
            return response()->json([
                'status' => 200,
                'message' => 'ilan oluşturuldu'
            ], 200);
        }
        return response()->json([
            'status' => 500,
            'message' => 'bir hata oluştu'
        ], 500);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => 200,
                'message' => 'giriş başarılı',
                'user' => Auth::user()
            ], 200);
        }
        return response()->json([
            'status' => 404,
            'message' => 'hata'
        ], 404);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|integer|between:1,2',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            "role" => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => 'kullanıcı oluşturuldu',

            ], 200);
        }
        return response()->json([
            'status' => 500,
            'message' => 'bir hata oluştu'
        ], 500);
    }
}
