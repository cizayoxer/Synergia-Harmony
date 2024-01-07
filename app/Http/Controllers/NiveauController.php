<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function getNiveaus(Request $request)
    {
        $niveaus = Niveau::all();

        return response()->json($niveaus, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getNiveauById(Request $request,$niveauId)
    {
        return response()->json(Niveau::find($niveauId));
    }
}
