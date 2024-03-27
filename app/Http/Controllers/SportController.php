<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class SportController extends Controller
{

    public function getSports(Request $request)
    {
        $sports = Sport::all();
        return response()->json($sports, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getSportById(Request $request, $sportId)
    {
        return response()->json(Sport::find($sportId));
    }
}
