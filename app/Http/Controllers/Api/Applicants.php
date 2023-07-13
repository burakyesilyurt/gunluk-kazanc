<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;

class Applicants extends Controller
{
    function createProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'isim' => 'required|string|max:255',
            'yas' => 'required|numeric|min:18|max:100',
            'tel' => 'required|min:8|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'universite' => 'nullable|string',
            'bolum' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        if (Employee::where('user_id', $request->userId)->exists()) {
            Employee::where('user_id', $request->userId)->update([
                'isim' => $request->isim,
                'yas' => $request->yas,
                'telefon' => $request->tel,
                'universite' => $request->universite,
                'bolum' => $request->bolum,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'profil güncellendi'
            ], 200);
        }

        $employee = Employee::create([
            'isim' => $request->isim,
            'yas' => $request->yas,
            'telefon' => $request->tel,
            'universite' => $request->universite,
            'bolum' => $request->bolum,
            'mail' => $request->email,
            'user_id' => $request->userId
        ]);
        if ($employee) {
            return response()->json([
                'status' => 200,
                'message' => 'profil oluşturuldu'
            ], 200);
        }

        return response()->json([
            'status' => 500,
            'message' => 'bir hata oluştu'
        ], 500);
    }

    function profileInfo($userId)
    {
        if (Employee::where('user_id', $userId)->exists()) {
            $user = Employee::where('user_id', $userId)->first();
            return response()->json([
                'status' => 200,
                'user' => $user
            ], 200);
        }
        return response()->json([
            'status' => 404,
            'message' => 'kullanıcı profili bulunamadı'
        ], 404);
    }
}
