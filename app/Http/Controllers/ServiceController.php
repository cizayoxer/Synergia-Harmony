<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Récupère tous les services disponibles.
     *
     * @return JsonResponse JSON contenant tous les services.
     *
     * @OA\Get(
     *     path="/services",
     *     tags={"Services"},
     *     summary="Récupère tous les services disponibles.",
     *     description="Récupère tous les services disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des services récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Service")
     *         )
     *     )
     * )
     */
    public function getServices(Request $request)
    {
        $services = Service::all();
        return response()->json($services, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère un service spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $service L'ID du service à récupérer.
     * @return JsonResponse Un JSON contenant le service spécifié.
     *
     * @OA\Get(
     *     path="/services/{service}",
     *     tags={"Services"},
     *     summary="Récupère un service spécifique.",
     *     description="Récupère un service spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="service",
     *         in="path",
     *         required=true,
     *         description="ID du service à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Service récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Service")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Service non trouvé."
     *     )
     * )
     */
    public function getServiceById(Request $request, $service)
    {
        return response()->json(Service::find($service));
    }
}
