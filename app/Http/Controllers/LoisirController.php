<?php

namespace App\Http\Controllers;

use App\Models\TypeLoisir;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoisirController extends Controller
{

    public function getLoisirs(Request $request)
    {
        $loisirs = TypeLoisir::all();
        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function getLoisirById(Request $request, $loisirId)
    {
        return response()->json(TypeLoisir::find($loisirId));
    }
}
