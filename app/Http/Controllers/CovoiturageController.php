<?php

namespace App\Http\Controllers;

use App\Models\COVOITURAGE;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class CovoiturageController extends Controller
{

    public function getConvoits(Request $request)
    {
        $convoits = COVOITURAGE::all();
        return response()->json($convoits, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getConvoitById(Request $request, $convoit)
    {
        return response()->json(COVOITURAGE::find($convoit));
    }
}
