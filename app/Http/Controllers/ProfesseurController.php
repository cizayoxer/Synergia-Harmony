<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfesseurController extends Controller
{
    /**
     * Récupère tous les professeurs disponibles.
     *
     * @return JsonResponse JSON contenant tous les professeurs.
     *
     * @OA\Get(
     *     path="/professeurs",
     *     tags={"Professeurs"},
     *     summary="Récupère tous les professeurs disponibles.",
     *     description="Récupère tous les professeurs disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des professeurs récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Professeur")
     *         )
     *     )
     * )
     */
    public function getProfs(Request $request)
    {
        $profs = Professeur::all();
        return response()->json($profs, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère un professeur spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $profById L'ID du professeur à récupérer.
     * @return JsonResponse Un JSON contenant le professeur spécifié.
     *
     * @OA\Get(
     *     path="/professeurs/{profById}",
     *     tags={"Professeurs"},
     *     summary="Récupère un professeur spécifique.",
     *     description="Récupère un professeur spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="profById",
     *         in="path",
     *         required=true,
     *         description="ID du professeur à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Professeur récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Professeur")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Professeur non trouvé."
     *     )
     * )
     */
    public function getProfById(Request $request, $profById)
    {
        return response()->json(Professeur::find($profById));
    }
}
