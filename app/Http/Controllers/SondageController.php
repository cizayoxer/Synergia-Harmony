<?php

namespace App\Http\Controllers;

use App\Models\SONDAGE;
use Illuminate\Http\Request;

class SondageController extends Controller
{
    public function getSondages()
    {
        $sondages = Sondage::all();

        return response()->json($sondages, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getSondageById(Request $request,$sondageId)
    {
        return response()->json(Sondage::find($sondageId));
    }
}
