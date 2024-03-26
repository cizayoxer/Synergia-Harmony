<?php

namespace App\Http\Controllers;

use App\Models\Sondage; // Utiliser le modèle Sondage correctement
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class SondageController extends Controller
{
    /**
     * Récupère tous les sondages disponibles.
     *
     * @return JsonResponse JSON contenant tous les sondages.
     *
     * @OA\Get(
     *     path="/sondages",
     *     tags={"Sondages"},
     *     summary="Récupère tous les sondages disponibles.",
     *     description="Récupère tous les sondages disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des sondages récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Sondage")
     *         )
     *     )
     * )
     */
    public function getSondages()
    {
        // Récupérer tous les sondages
        $sondages = Sondage::all();

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

    /**
     * Récupère un sondage spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $sondageId L'ID du sondage à récupérer.
     * @return JsonResponse Un JSON contenant le sondage spécifié.
     *
     * @OA\Get(
     *     path="/sondages/{sondageId}",
     *     tags={"Sondages"},
     *     summary="Récupère un sondage spécifique.",
     *     description="Récupère un sondage spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="sondageId",
     *         in="path",
     *         required=true,
     *         description="ID du sondage à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sondage récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Sondage")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sondage non trouvé."
     *     )
     * )
     */
    public function getSondageById(Request $request, $sondageId)
    {
        $sondage = Sondage::find($sondageId);

        $votesPour = $sondage->votes()->where('AVIS', 'POUR')->count();
        $votesContre = $sondage->votes()->where('AVIS', 'CONTRE')->count();
        $sondage->votes_pour = $votesPour;
        $sondage->votes_contre = $votesContre;

        return response()->json($sondage, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
