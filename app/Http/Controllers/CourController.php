<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function getCours()
    {
        $cours = Cour::all();

        return response()->json($cours, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getCourById(Request $request,$courId)
    {
        return response()->json(Cour::find($courId));
    }
}
