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

        if ($loisirs==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else
        {
            foreach ($loisirs as $loisir) {

                $nomService = $loisir->s_e_r_v_i_c_e->LIBELLESERVICE;
                $nombreDeReservations = $loisir->nbPersonneReservation();
                $loisir->nombreDeReservations = $nombreDeReservations;
            }
            return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
        }

    }

    public function getLoisirById(Request $request, $loisirId)
    {
        $loisirs = Loisir::find($loisirId);

        if ($loisirs==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else {
            $nomService = $loisirs->s_e_r_v_i_c_e->LIBELLESERVICE;
            $nombreDeReservations = $loisirs->nbPersonneReservation();
            $loisirs->nombreDeReservations = $nombreDeReservations;
            return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }


}
