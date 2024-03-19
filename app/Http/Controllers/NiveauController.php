<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class NiveauController extends Controller
{
    /**
     * Récupère tous les niveaux disponibles.
     *
     * @return JsonResponse JSON contenant tous les niveaux.
     *
     * @OA\Get(
     *     path="/niveaux",
     *     tags={"Niveaux"},
     *     summary="Récupère tous les niveaux disponibles.",
     *     description="Récupère tous les niveaux disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des niveaux récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Niveau")
     *         )
     *     )
     * )
     */
    public function getNiveaus(Request $request)
    {
        $niveaux = Niveau::all();
        return response()->json($niveaux, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère un niveau spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $niveauId L'ID du niveau à récupérer.
     * @return JsonResponse Un JSON contenant le niveau spécifié.
     *
     * @OA\Get(
     *     path="/niveaux/{niveauId}",
     *     tags={"Niveaux"},
     *     summary="Récupère un niveau spécifique.",
     *     description="Récupère un niveau spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="niveauId",
     *         in="path",
     *         required=true,
     *         description="ID du niveau à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Niveau récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Niveau")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Niveau non trouvé."
     *     )
     * )
     */
    public function getNiveauById(Request $request, $niveauId)
    {
        return response()->json(Niveau::find($niveauId));
    }
}
