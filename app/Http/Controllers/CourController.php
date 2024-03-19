<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class CourController extends Controller
{
    /**
     * Récupère tous les cours disponibles.
     *
     * @return JsonResponse JSON contenant tous les cours.
     *
     * @OA\Get(
     *     path="/cours",
     *     tags={"Cours"},
     *     summary="Récupère tous les cours disponibles.",
     *     description="Récupère tous les cours disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des cours récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Cour")
     *         )
     *     )
     * )
     */
    public function getCours()
    {
        $cours = Cour::all();

        return response()->json($cours, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère un cours spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $courId L'ID du cours à récupérer.
     * @return JsonResponse Un JSON contenant le cours spécifié.
     *
     * @OA\Get(
     *     path="/cours/{courId}",
     *     tags={"Cours"},
     *     summary="Récupère un cours spécifique.",
     *     description="Récupère un cours spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="courId",
     *         in="path",
     *         required=true,
     *         description="ID du cours à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cours récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Cour")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cours non trouvé."
     *     )
     * )
     */
    public function getCourById(Request $request, $courId)
    {
        $cour = DB::table('COURS')
            ->select('COURS.IDMATIERE as Classe', 'LIBELLEMATIERE', 'LIBELLESPECIALITE', 'UTILISATEUR.NOMUTILISATEUR', 'UTILISATEUR.PRENOMUTILISATEUR', 'EMAIL')
            ->join('CLASSE', 'COURS.IDSPECIALITE', '=', 'CLASSE.IDSPECIALITE')
            ->join('ETRE_INCLU', 'ETRE_INCLU.IDSPECIALITE', '=', 'COURS.IDSPECIALITE')
            ->join('ETUDIANT', 'ETUDIANT.IDUTILISATEUR', '=', 'ETRE_INCLU.IDUTILISATEUR')
            ->join('UTILISATEUR', 'UTILISATEUR.IDUTILISATEUR', '=', 'ETUDIANT.IDUTILISATEUR')
            ->where('COURS.IDMATIERE', $courId)
            ->get();

        return response()->json($cour, 200, [], JSON_UNESCAPED_UNICODE);
    }






}
