<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Employer extends Controller
{
    public function appliers($id)
    {
        $appliers = DB::select('Select users.id, users.name, users.email, works.baslik FROM users, applicants, works WHERE applicants.kullanici_id = users.id AND applicants.ilan_id = works.id AND applicants.firma_id = ?', [$id]);

        if (count($appliers) > 0) {
            return response()->json(['status' => 200, 'appliers' => $appliers], 200);
        }
        return response()->json(['status' => 404, 'message' => "başvuran bulunamamakta"], 404);
    }

    public function getEmployerJobs($firmaId)
    {
        $works = Works::where('firma_id', $firmaId)->orderBy('created_at', 'DESC')->get();
        if ($works->count() > 0) {
            return response()->json(['status' => 200, 'works' => $works], 200);
        }
        return response()->json(['status' => 404, 'message' => "İlan bulunamamakta"], 404);
    }
}
