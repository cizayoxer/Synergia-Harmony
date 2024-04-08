<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\EvenementSportif;
use Illuminate\Http\Request;
use Carbon\Carbon;


class EvenementController extends Controller
{


    public function getEvenementsSport()
    {
        $aujourdhui = Carbon::now();

        $evenementsSport = EvenementSportif::whereHas('s_e_r_v_i_c_e', function ($query) use ($aujourdhui) {
            $query->where('DATEPREVUE', '>', $aujourdhui)
                ->where('IDSTATUT', '=', 1);
        })->get();

        if ($evenementsSport->isEmpty()) {
            return response()->json(['message' => 'Aucun événement sportif prévu pour une date ultérieure avec ce statut.'], 404);
        } else {
            foreach ($evenementsSport as $evenement) {
                $nomSport = $evenement->LIBELLESPORT;
                $nomService = $evenement->s_e_r_v_i_c_e->LIBELLESERVICE;
                $nombreDeReservations = $evenement->nbPersonneReservation();
                $evenement->nombreDeReservations = $nombreDeReservations;
            }

            return response()->json($evenementsSport, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }



    public function getEvenementsSportById(Request $request, $idService)
    {

        $evenementsSport = EvenementSportif::find($idService);
        if ($evenementsSport==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else {
            $nomService = $evenementsSport->s_e_r_v_i_c_e->LIBELLESERVICE;

            $nombreDeReservations = $evenementsSport->nbPersonneReservation();
            $evenementsSport->nombreDeReservations = $nombreDeReservations;

            return response()->json($evenementsSport, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }


    public function getEvenementsCinema()
    {
        $maintenant = Carbon::now();

        $evenementsCinema = Cinema::where('DATEHEUREFILM', '>', $maintenant)
            ->whereHas('s_e_r_v_i_c_e', function ($query) {
                $query->where('IDSTATUT', '=', 1);
            })
            ->get();

        if ($evenementsCinema->isEmpty()) {
            return response()->json();
        } else {
            foreach ($evenementsCinema as $cinema) {

                $nomService = $cinema->s_e_r_v_i_c_e->LIBELLESERVICE;
                $nombreDeReservations = $cinema->nbPersonneReservation();
                $cinema->nombreDeReservations = $nombreDeReservations;
            }
            return response()->json($evenementsCinema, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }


    public function getEvenementsCinemaById(Request $request, $idService)
    {
        $evenementCinema = Cinema::find($idService);
        if ($evenementCinema==null)
        {
            return response()->json();
        }
        else {
            $nomService = $evenementCinema->s_e_r_v_i_c_e->LIBELLESERVICE;
            $nombreDeReservations = $evenementCinema->nbPersonneReservation();
            $evenementCinema->nombreDeReservations = $nombreDeReservations;

            return response()->json($evenementCinema, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }

}
