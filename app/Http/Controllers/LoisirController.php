<?php

namespace App\Http\Controllers;

use App\Models\TypeLoisir;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoisirController extends Controller
{
    /**
     * Récupère tous les loisirs disponibles.
     *
     * @return JsonResponse JSON contenant tous les loisirs.
     *
     * @OA\Get(
     *     path="/loisirs",
     *     tags={"Loisirs"},
     *     summary="Récupère tous les loisirs disponibles.",
     *     description="Récupère tous les loisirs disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des loisirs récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/TypeLoisir")
     *         )
     *     )
     * )
     */
    public function getLoisirs(Request $request)
    {
        $loisirs = TypeLoisir::all();
        return response()->json($loisirs, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère un loisir spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $loisirId L'ID du loisir à récupérer.
     * @return JsonResponse Un JSON contenant le loisir spécifié.
     *
     * @OA\Get(
     *     path="/loisirs/{loisirId}",
     *     tags={"Loisirs"},
     *     summary="Récupère un loisir spécifique.",
     *     description="Récupère un loisir spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="loisirId",
     *         in="path",
     *         required=true,
     *         description="ID du loisir à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Loisir récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/TypeLoisir")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Loisir non trouvé."
     *     )
     * )
     */
    public function getLoisirById(Request $request, $loisirId)
    {
        return response()->json(TypeLoisir::find($loisirId));
    }
}
