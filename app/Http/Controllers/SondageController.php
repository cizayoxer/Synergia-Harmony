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
        $sondages = Sondage::all();
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
        return response()->json(Sondage::find($sondageId));
    }
}
