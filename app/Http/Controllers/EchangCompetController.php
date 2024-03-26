<?php

namespace App\Http\Controllers;

use App\Models\ECHANGECOMPETENCE;
use Illuminate\Http\Request;

class EchangCompetController extends Controller
{
    /**
     * Récupère toutes les échanges de compétence avec les noms de matière et de niveau.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllEchanges()
    {
        // Récupérer toutes les échanges de compétence
        $echanges = ECHANGECOMPETENCE::all();

        // Parcourir chaque échange de compétence pour obtenir les détails de matière et de niveau
        foreach ($echanges as $echange) {
            // Récupérer le nom de la matière et le nom du niveau à partir des relations
            $nomMatiere = $echange->c_o_u_r->NOM_MATIERE;
            $nomNiveau = $echange->n_i_v_e_a_u->NOM_NIVEAU;

            // Ajouter les noms de matière et de niveau à l'échange de compétence
            $echange->nom_matiere = $nomMatiere;
            $echange->nom_niveau = $nomNiveau;
        }

        // Retourner la réponse JSON
        return response()->json($echanges, 200);
    }

    /**
     * Récupère un échange de compétence par ID de service avec les noms de matière et de niveau.
     *
     * @param  int  $idService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEchangeById($idService)
    {
        // Récupérer l'échange de compétence par ID de service
        $echange = ECHANGECOMPETENCE::find($idService);

        // Vérifier si l'échange de compétence existe
        if ($echange) {
            // Récupérer le nom de la matière et le nom du niveau à partir des relations
            $nomMatiere = $echange->c_o_u_r->NOM_MATIERE;
            $nomNiveau = $echange->n_i_v_e_a_u->NOM_NIVEAU;

            // Ajouter les noms de matière et de niveau à l'échange de compétence
            $echange->nom_matiere = $nomMatiere;
            $echange->nom_niveau = $nomNiveau;

            // Retourner la réponse JSON
            return response()->json($echange, 200);
        } else {
            // Retourner une réponse JSON avec un message d'erreur
            return response()->json(['message' => 'Échange de compétence non trouvé.'], 404);
        }
    }
}
