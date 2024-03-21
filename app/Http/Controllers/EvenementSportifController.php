<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\EvenementSportif;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class EvenementSportifController extends Controller
{
    /**
     * Récupère tous les événements sportifs.
     *
     * @return JsonResponse JSON contenant tous les événements sportifs.
     *
     * @OA\Get(
     *     path="/evenements/sportifs",
     *     tags={"Evenements Sportifs"},
     *     summary="Récupère tous les événements sportifs.",
     *     description="Récupère tous les événements sportifs dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des événements sportifs récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/EvenementSportif")
     *         )
     *     )
     * )
     */
    public function getEvenementsSport()
    {
        $evenementsSport = EvenementSportif::all();
        return response()->json($evenementsSport, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère tous les événements cinéma.
     *
     * @return JsonResponse JSON contenant tous les événements cinéma.
     *
     * @OA\Get(
     *     path="/evenements/cinema",
     *     tags={"Evenements Cinéma"},
     *     summary="Récupère tous les événements cinéma.",
     *     description="Récupère tous les événements cinéma dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des événements cinéma récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Cinema")
     *         )
     *     )
     * )
     */
    public function getEvenementsCinema()
    {
        $evenementsCinema = Cinema::all();
        return response()->json($evenementsCinema, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
