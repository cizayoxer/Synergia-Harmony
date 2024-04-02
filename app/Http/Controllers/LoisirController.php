<?php

namespace App\Http\Controllers;

use App\Models\Loisir;
use App\Models\TypeLoisir;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoisirController extends Controller
{

    public function getLoisirsType(Request $request)
    {
        $loisirs = TypeLoisir::all();

        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getLoisirs(Request $request)
    {
        $loisirs = Loisir::all();
        foreach ($loisirs as $loisir) {

            $nomService = $loisir->s_e_r_v_i_c_e->LIBELLESERVICE;

        }
        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getLoisirById(Request $request, $loisirId)
    {
        $loisirs = Loisir::find($loisirId);

        $nomService = $loisirs->s_e_r_v_i_c_e->LIBELLESERVICE;
        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }


}
