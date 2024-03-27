<?php

namespace App\Http\Controllers;

use App\Models\SONDAGE; // Utiliser le modèle Sondage correctement
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class SondageController extends Controller
{
    public function getSondages()
    {
        // Récupérer tous les sondages
        $sondages = SONDAGE::all();

        // Parcourir chaque sondage pour ajouter les informations de vote
        foreach ($sondages as $sondage) {

            $votesPour = $sondage->votes()->where('AVIS', 'POUR')->count();
            $votesContre = $sondage->votes()->where('AVIS', 'CONTRE')->count();
            $sondage->votes_pour = $votesPour;
            $sondage->votes_contre = $votesContre;
        }

        // Retourner la réponse JSON avec les données de vote ajoutées à chaque sondage
        return response()->json($sondages, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getSondageById(Request $request, $sondageId)
    {
        $sondage = SONDAGE::find($sondageId);

        $votesPour = $sondage->votes()->where('AVIS', 'POUR')->count();
        $votesContre = $sondage->votes()->where('AVIS', 'CONTRE')->count();
        $sondage->votes_pour = $votesPour;
        $sondage->votes_contre = $votesContre;

        return response()->json($sondage, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
