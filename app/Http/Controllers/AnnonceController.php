<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function getAnnonces(Request $request)
    {
        $annonces = Annonce::all();

        return response()->json($annonces, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getAnnonceById(Request $request,$annonceId)
    {
        return response()->json(Annonce::find($annonceId));
    }

    public function deleteAnnonce(Request $request, $annonceId)
    {
        $annonce = Annonce::find($annonceId);

        if (!$annonce) {
            return response()->json(['message' => 'Annonce non trouvée.'], 404);
        }

        $annonce->delete();

        return response()->json(['message' => 'Annonce supprimée avec succès.']);
    }

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






