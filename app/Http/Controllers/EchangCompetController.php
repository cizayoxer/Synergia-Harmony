<?php

namespace App\Http\Controllers;

use App\Models\EchangeCompetence;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EchangCompetController extends Controller
{

    public function getAllEchanges()
    {
        $aujourdhui = Carbon::now();

        $echanges = EchangeCompetence::whereHas('s_e_r_v_i_c_e', function ($query) use ($aujourdhui) {
            $query->where('DATEPREVUE', '>', $aujourdhui)
                ->where('IDSTATUT', '=', 1);
        })->get();

        if ($echanges->isEmpty()) {
            return response()->json(['message' => 'Aucun échange de compétence prévu pour une date ultérieure avec ce statut.'], 404);
        } else {
            foreach ($echanges as $echange) {
                $nomMatiere = $echange->NOM_MATIERE;
                $nomNiveau = $echange->n_i_v_e_a_u->NOM_NIVEAU;
                $nomService = $echange->s_e_r_v_i_c_e->LIBELLESERVICE;
                $nombreDeReservations = $echange->nbPersonneReservation();
                $echange->nombreDeReservations = $nombreDeReservations;
            }

            return response()->json($echanges, 200);
        }
    }




    public function getEchangeById($idService)
    {
        $echange = EchangeCompetence::find($idService);

        if ($echange) {

            $nomMatiere = $echange->NOM_MATIERE;
            $nomNiveau = $echange->n_i_v_e_a_u->NOM_NIVEAU;
            $nomService = $echange->s_e_r_v_i_c_e->LIBELLESERVICE;
            $nombreDeReservations = $echange->nbPersonneReservation();
            $echange->nombreDeReservations = $nombreDeReservations;

            return response()->json($echange, 200);
        } else {
            return response()->json(['message' => 'Échange de compétence non trouvé.'], 404);
        }
    }
}
