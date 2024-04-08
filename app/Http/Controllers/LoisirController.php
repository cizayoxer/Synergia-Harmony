<?php

namespace App\Http\Controllers;

use App\Models\Loisir;
use App\Models\TypeLoisir;
use Illuminate\Http\Request;
use Carbon\Carbon;
class LoisirController extends Controller
{

    public function getLoisirsType(Request $request)
    {
        $loisirs = TypeLoisir::all();

        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }



    public function getLoisirs(Request $request)
    {

        $aujourdhui = Carbon::now();
        $loisirs = Loisir::whereHas('s_e_r_v_i_c_e', function ($query) use ($aujourdhui) {
            $query->where('DATEPREVUE', '>', $aujourdhui)
                ->where('IDSTATUT', '=', 1);
        })->get();

        if ($loisirs->isEmpty()) {
            return response()->json(['message' => 'Aucun loisir prévu pour une date ultérieure avec ce statut.'], 404);
        } else {

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
