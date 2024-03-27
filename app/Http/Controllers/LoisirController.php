<?php

namespace App\Http\Controllers;

use App\Models\LOISIR;
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
            $nomLoisir = $loisir->t_y_p_e_l_o_i_s_i_r->LIBELLELOISIR;
        }
        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getLoisirById(Request $request, $loisirId)
    {
        $loisirs = Loisir::find($loisirId);

            $nomService = $loisirs->s_e_r_v_i_c_e->LIBELLESERVICE;
            $nomLoisir = $loisirs->t_y_p_e_l_o_i_s_i_r->LIBELLELOISIR;
        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }


}
