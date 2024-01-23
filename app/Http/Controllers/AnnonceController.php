<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Récupère toutes les annonces disponibles.
     *
     * @return \Illuminate\Http\JsonResponse JSON contenant toutes les annonces.
     */
    public function getAnnonces()
    {
        $annonces = Annonce::all();

        return response()->json($annonces, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère une annonce spécifique en utilisant son ID.
     *
     * @param \Illuminate\Http\Request $request La requête HTTP.
     * @param int $annonceId L'ID de l'annonce à récupérer.
     * @return \Illuminate\Http\JsonResponse Un JSON contenant l'annonce spécifiée.
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
     * @return \Illuminate\Http\JsonResponse Renvoi un message si la suppression a été effectué
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






