<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class NiveauController extends Controller
{

    public function getNiveaus(Request $request)
    {
        $niveaux = Niveau::all();
        return response()->json($niveaux, 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function getNiveauById(Request $request, $niveauId)
    {
        return response()->json(Niveau::find($niveauId));
    }
}
