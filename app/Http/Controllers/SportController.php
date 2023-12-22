<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function getSports(Request $request)
    {
        $sports = Sport::all();

        return response()->json($sports, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getSportById(Request $request,$sportId)
    {
        return response()->json(Sport::find($sportId));
    }
}
