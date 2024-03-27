<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfesseurController extends Controller
{

    public function getProfs(Request $request)
    {
        $profs = Professeur::all();
        return response()->json($profs, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getProfById(Request $request, $profById)
    {
        return response()->json(Professeur::find($profById));
    }
}
