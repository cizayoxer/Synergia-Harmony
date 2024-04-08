<?php

namespace App\Http\Controllers;

use App\Models\Covoiturage;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class CovoiturageController extends Controller
{

    public function getConvoits(Request $request)
    {
        $convoits = Covoiturage::all();
        if ($convoits==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else
        {
        // Parcourir chaque événement sportif
            foreach ($convoits as $convoit) {
                // Récupérer le nom du sport associé à partir de la relation
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
