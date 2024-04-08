<?php

namespace App\Http\Controllers;

use App\Models\Covoiturage;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CovoiturageController extends Controller
{

    public function getConvoits(Request $request)
    {
        $aujourdhui = Carbon::now();
        $convoits = Covoiturage::where('DATECOVOIT', '>', $aujourdhui)
            ->whereHas('s_e_r_v_i_c_e', function ($query) {
                $query->where('IDSTATUT', '=', 1);
            })
            ->get();
        if ($convoits==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else
        {

            foreach ($convoits as $convoit) {
                $nomService = $convoit->s_e_r_v_i_c_e->LIBELLESERVICE;
                $nombreDeReservations = $convoit->nbPersonneReservation();
                $convoit->nombreDeReservations = $nombreDeReservations;

            }
            return response()->json($convoits, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }

    public function getConvoitById(Request $request, $convoit)
    {
        $convoiturage=Covoiturage::find($convoit);
        if ($convoiturage==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else
        {
            $nombreDeReservations = $convoiturage->nbPersonneReservation();
            $convoiturage->nombreDeReservations = $nombreDeReservations;

            $service = $convoiturage->s_e_r_v_i_c_e;

            return response()->json($convoiturage);
        }

    }
}
