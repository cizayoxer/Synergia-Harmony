<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\EvenementSportif;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class EvenementController extends Controller
{

    public function getEvenementsSport()
    {
        $evenementsSport = EvenementSportif::all();

        // Parcourir chaque événement sportif
        foreach ($evenementsSport as $evenement) {
            // Récupérer le nom du sport associé à partir de la relation
            $nomSport = $evenement->s_p_o_r_t->LIBELLESPORT;
        }

        return response()->json($evenementsSport, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getEvenementsCinema()
    {
        $evenementsCinema = Cinema::all();
        return response()->json($evenementsCinema, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
