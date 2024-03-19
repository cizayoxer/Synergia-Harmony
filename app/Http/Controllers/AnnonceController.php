<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class AnnonceController extends Controller
{
    /**
     * Récupère toutes les annonces disponibles.
     *
     * @return JsonResponse JSON contenant toutes les annonces.
     *
     * @OA\Get(
     *     path="/annonces",
     *     tags={"Annonces"},
     *     summary="Récupère toutes les annonces disponibles.",
     *     description="Récupère toutes les annonces disponibles dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des annonces récupérées avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Annonce")
     *         )
     *     )
     * )
     */
    public function getAnnonces()
    {
        $annonces = Annonce::all();

        return response()->json($annonces, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère une annonce spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $annonceId L'ID de l'annonce à récupérer.
     * @return JsonResponse Un JSON contenant l'annonce spécifiée.
     *
     * @OA\Get(
     *     path="/annonces/{annonceId}",
     *     tags={"Annonces"},
     *     summary="Récupère une annonce spécifique.",
     *     description="Récupère une annonce spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="annonceId",
     *         in="path",
     *         required=true,
     *         description="ID de l'annonce à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Annonce récupérée avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Annonce")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Annonce non trouvée."
     *     )
     * )
     */
    public function getAnnonceById(Request $request,$annonceId)
    {
        return response()->json(Annonce::find($annonceId));
    }

    /**
     * Supprime une annonce spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $annonceId L'ID de l'annonce à supprimer.
     * @return JsonResponse Renvoie un message si la suppression a été effectuée.
     *
     * @OA\Delete(
     *     path="/annonces/{annonceId}",
     *     tags={"Annonces"},
     *     summary="Supprime une annonce spécifique.",
     *     description="Supprime une annonce spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="annonceId",
     *         in="path",
     *         required=true,
     *         description="ID de l'annonce à supprimer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Annonce supprimée avec succès."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Annonce non trouvée."
     *     )
     * )
     */
    public function deleteAnnonce(Request $request, $annonceId)
    {
        $annonce = Annonce::find($annonceId);

        if (!$annonce) {
            return response()->json(['message' => 'Annonce non trouvée.'], 404);
        }

        $annonce->delete();

        return response()->json(['message' => 'Annonce supprimée avec succès.']);
    }

    /**
     * Ajoute une nouvelle annonce.
     *
     * @param Request $request La requête HTTP.
     * @return JsonResponse
     *
     * @OA\Post(
     *     path="/annonces",
     *     tags={"Annonces"},
     *     summary="Ajoute une nouvelle annonce.",
     *     description="Ajoute une nouvelle annonce dans le système.",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Données de l'annonce à ajouter.",
     *         @OA\JsonContent(ref="#/components/schemas/Annonce")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Annonce ajoutée avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Annonce")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erreur lors de la création de l'annonce."
     *     )
     * )
     */
    function addAnnonce(Request $request)
    {

        $request->validate([
            'IDSERVICE' => 'required',
            'IDUTILISATEUR' => 'required',
            'IDUTILISATEUR_1' => 'required',
            'IDUTILISATEUR_2' => 'required',
            'TITREANNONCE' => 'required',
            'DESCRIPTIONANNONCE' => 'required',
            'COUTANNONCE' => 'required',
            'DATEPUBLICATIONANNONCE' => 'required',
            'DATETRANSACTION' => 'required',
            'DATEPREVUE' => 'required',
        ]);

        try {

            $annonce = Annonce::create($request->all());

            return response()->json($annonce, 201);
        } catch (\Exception $e) {

            return response()->json(['error' => "Erreur lors de la création de l'annonce."], 500);
        }
    }

    /**
     * Récupère les dernières annonces.
     *
     * @param Request $request La requête HTTP.
     * @param int $NombreAnnonce Le nombre d'annonces à récupérer (par défaut : 10).
     * @return JsonResponse
     *
     * @OA\Get(
     *     path="/annonces/last/{NombreAnnonce}",
     *     tags={"Annonces"},
     *     summary="Récupère les dernières annonces.",
     *     description="Récupère les dernières annonces dans le système.",
     *     @OA\Parameter(
     *         name="NombreAnnonce",
     *         in="path",
     *         required=false,
     *         description="Le nombre d'annonces à récupérer (par défaut : 10).",
     *         @OA\Schema(type="integer", default=10)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Liste des dernières annonces récupérées avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Annonce")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erreur lors de la récupération des annonces."
     *     )
     * )
     */
    public function getLastAnnonces(Request $request, int $NombreAnnonce = 10)
    {
        try {

            $annonces = Annonce::orderBy('DATEPUBLICATIONANNONCE', 'desc')
                ->take($NombreAnnonce)
                ->get();

            return response()->json($annonces, 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des annonces.'], 500);
        }
    }

}






