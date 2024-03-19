<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class SportController extends Controller
{
    /**
     * Récupère tous les sports disponibles.
     *
     * @return JsonResponse JSON contenant tous les sports.
     *
     * @OA\Get(
     *     path="/sports",
     *     tags={"Sports"},
     *     summary="Récupère tous les sports disponibles.",
     *     description="Récupère tous les sports disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des sports récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Sport")
     *         )
     *     )
     * )
     */
    public function getSports(Request $request)
    {
        $sports = Sport::all();
        return response()->json($sports, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère un sport spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $sportId L'ID du sport à récupérer.
     * @return JsonResponse Un JSON contenant le sport spécifié.
     *
     * @OA\Get(
     *     path="/sports/{sportId}",
     *     tags={"Sports"},
     *     summary="Récupère un sport spécifique.",
     *     description="Récupère un sport spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="sportId",
     *         in="path",
     *         required=true,
     *         description="ID du sport à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sport récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Sport")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sport non trouvé."
     *     )
     * )
     */
    public function getSportById(Request $request, $sportId)
    {
        return response()->json(Sport::find($sportId));
    }
}
