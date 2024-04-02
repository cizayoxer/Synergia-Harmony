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
            $nomSport = $evenement->LIBELLESPORT;
            $nomService = $evenement->s_e_r_v_i_c_e->LIBELLESERVICE;
        }

        return response()->json($evenementsSport, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getEvenementsSportById(Request $request, $idService)
    {
        $evenementsSport = EvenementSportif::find($idService);

        $nomService = $evenementsSport->s_e_r_v_i_c_e->LIBELLESERVICE;

        return response()->json($evenementsSport, 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function getEvenementsCinema()
    {
        $evenementsCinema = Cinema::all();
        foreach ($evenementsCinema as $cinema) {

            $nomService = $cinema->s_e_r_v_i_c_e->LIBELLESERVICE;
        }
        return response()->json($evenementsCinema, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getEvenementsCinemaById(Request $request, $idService)
    {
        $evenementCinema = Cinema::find($idService);

        $nomService = $evenementCinema->s_e_r_v_i_c_e->LIBELLESERVICE;

        return response()->json($evenementCinema, 200, [], JSON_UNESCAPED_UNICODE);
    }

}
